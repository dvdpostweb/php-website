/* TheFilterCaptureService.js 
Exabre Ltd (c) 2009   
Evidence Capture for Recommendation Service
*/

/***** Public Callback *****/

// Stored callback for returning capture event responses
function FilterCaptureRestResponse(response, scriptId)
{
   // alert( 'EventId='+scriptId+'<br/>'+response);
}
var filterCaptureCallback = FilterCaptureRestResponse;

/***** Event Handlers *****/

//User adds product to wishlist
function DPFilterCapture_AddToWishlist(catalogId, wishlist, priority, userId, userLocale)
{
    return FilterCaptureRestCall('cmd=addevidence&eventtype=AddToWishlist&catalogid=' + catalogId +
                                    '&wishlist=' + wishlist + '&priority=' + priority + 
                                    '&userlocale=' + userLocale, userId);
}

//User removes product from wishlist
function DPFilterCapture_RemoveFromWishlist(catalogId, wishlist, userId, userLocale)
{
    return FilterCaptureRestCall('cmd=addevidence&eventtype=RemoveFromWishlist&catalogid=' + catalogId +
                                    '&wishlist=' + wishlist + 
                                    '&userlocale=' + userLocale, userId);
}

//User updates priority or moves item between wishlists
function DPFilterCapture_UpdateWishlistItem(catalogId, wishlist, priority, userId, userLocale)
{
    return FilterCaptureRestCall('cmd=addevidence&eventtype=UpdateWishlistItem&catalogid=' + catalogId +
                                    '&wishlist=' + wishlist + '&priority=' + priority +
                                    '&userlocale=' + userLocale, userId);
}

//User opens product page
function DPFilterCapture_ViewItemPage(catalogId, userId, userLocale)
{
	return FilterCaptureRestCall('cmd=addevidence&eventtype=ViewItemPage&catalogid=' + catalogId +
                                    '&userlocale=' + userLocale, userId);
}

//Product send to user to watch
function DPFilterCapture_DispatchedToUser(catalogId, userId, userLocale)
{
    return FilterCaptureRestCall('cmd=addevidence&eventtype=DispatchedToUser&catalogid=' + catalogId +
                                    '&userlocale=' + userLocale, userId);
}

//Product rated by user
function DPFilterCapture_Rating(catalogId, rating, userId, userLocale)
{
    return FilterCaptureRestCall('cmd=addevidence&eventtype=Rating&catalogid=' + catalogId +
                                    '&rating=' + rating +
                                    '&userlocale=' + userLocale, userId);
}

//Product bought by user
function DPFilterCapture_Buy(catalogId, userId, userLocale)
{
    return FilterCaptureRestCall('cmd=addevidence&eventtype=Buy&catalogid=' + catalogId +
                                    '&userlocale=' + userLocale, userId);
}

/** Private methods and vars **/

// Event Id counter
var filterService_Location = 'http://partners.thefilter.com/DVDPostService/CaptureService.ashx?';
var filterService_format = "JSON";

// This handles cross-server requests
function FilterCaptureRestCall(queryString, userId)
{
    if (filterService_format == "IMG")
        FilterCaptureIMGRestCall(queryString, userId)
    else if (filterService_format == "JSON")
        FilterCaptureJSONRestCall(queryString, userId)
}

function FilterCaptureIMGRestCall(queryString, userId)
{
    if (document.createElement)
    {
        var img = new Image();
        if (userId != null)
            img.src = filterService_Location + queryString + '&fmt=IMG&userid=' + userId + '&refid=' + new Date().getTime();
        else
            img.src = filterService_Location + queryString + '&fmt=IMG&refid=' + new Date().getTime();
    }
}

//Vars to keep JSON calls from stalling onload
var filterCaptureCounter = 1;
var filterService_Active = null;
var filterService_QS = [];
var filterService_UID = [];
var filterService_Count = 0;

function FilterCaptureJSONRestCall(queryString, userId)
{
    if (document.createElement)
    {
        if (filterService_Active == null)
        {
            FilterPing_Init();
            filterService_Active = -1;
        }
        if (filterService_Active == -1)
        {
            //store while waiting
            filterService_QS[filterService_Count] = queryString;
            filterService_UID[filterService_Count] = userId;
            filterService_Count++;
        }
        else if (filterService_Active != 0)
        {
            // Create script tag
            var serviceCallerScript = document.createElement("script");
            serviceCallerScript.setAttribute("type", "text/javascript");
            serviceCallerScript.setAttribute("charset", "utf-8");

            // Generate a unique script tag id
            var scriptId = 'FilterEvidenceId' + filterCaptureCounter++;
            serviceCallerScript.setAttribute("id", scriptId);

            if (userId != null)
                serviceCallerScript.setAttribute("src", filterService_Location + queryString + '&fmt=JSON&userid=' + userId + '&refid=' + scriptId);
            else
                serviceCallerScript.setAttribute("src", filterService_Location + queryString + '&fmt=JSON&refid=' + scriptId);

            // Add script to head and request call
            document.getElementsByTagName("head").item(0).appendChild(serviceCallerScript);
        }
    }
}

/** Server Ping Test**/

function FilterPing_Init()
{
    var img = new Image(1, 1);
    img.onload = function()
    {
        filterService_Active = 1;
        //delayed dispatch
        for (var i = 0; i < filterService_Count; i++)
            FilterCaptureRestCall(filterService_QS[i], filterService_UID[i]);

        filterService_QS = [];
        filterService_UID = [];
        filterService_Count = 0;
    };
    img.onerror = function()
    {
        filterService_Active = 0
        filterService_QS = [];
        filterService_UID = [];
        filterService_Count = 0;
    };
    img.src = filterService_Location + "cmd=ping&fmt=IMG";
}
/****/

