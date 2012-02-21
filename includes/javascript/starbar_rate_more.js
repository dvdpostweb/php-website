var STARBAR_STARS_PER_BAR = 5;
// Special ratings values, must be < 0
var STARBAR_NI_VALUE = -1;
var STARBAR_NOP_VALUE = -2;
var STARBAR_CLEAR_VALUE = -3;
//
var STARBAR_TYPE_EMPTY = 0;
var STARBAR_TYPE_PREDICT = 1;
var STARBAR_TYPE_RATE = 2;
var STARBAR_TYPE_STATIC = 3;
var STARBAR_TYPE_AVG = 4;
var STARBAR_TYPE_MAX = 4;
//
var STARBAR_HEIGHT = 15;
var STARBAR_STAR_WIDTH = 16;
var STARBAR_GAP_WIDTH = 3;
var STARBAR_WIDTH = STARBAR_STARS_PER_BAR*STARBAR_STAR_WIDTH + (STARBAR_STARS_PER_BAR-1)*STARBAR_GAP_WIDTH;
// STARBAR_WIDTH = 5 * 16 + 4 * 3 = 80 + 12 = 92
var STARBAR_ROW_PADDING = 3;
//
var STARBAR_NI_MINI_BUTTON_WIDTH = 19;
var STARBAR_NI_MINI_BUTTON_HEIGHT = 15;
var STARBAR_NI_BUTTON_HEIGHT = 16;
var STARBAR_NI_BUTTON_WIDTH = 92;
var STARBAR_CLEAR_BUTTON_HEIGHT = 16;
var STARBAR_CLEAR_BUTTON_WIDTH = 92;
var STARBAR_NOP_BUTTON_HEIGHT = 16;
var STARBAR_NOP_BUTTON_WIDTH = 92;
//
// Storing and preloading of starbar images
//
var StarbarImages;
function StarbarImageName(starType, n) {
    return STARBAR_IMG_ROOT + "stars_" + starType + "_" + n + ".gif";
}
function StarbarImage(starType, numStars) {
    // If already fetched and cached, use it.
    // Otherwise cache it now for future use.
    var n;
    if (numStars > 5) {
        n = 50;
    } else if (numStars < 0) {
        n = 0;
    } else {
        n = Math.round(numStars * 10);
    }
    if (! StarbarImages[starType][n]) {
        StarbarImages[starType][n] = new Image(STARBAR_WIDTH, STARBAR_HEIGHT);
        StarbarImages[starType][n].src = StarbarImageName(starType, n);
    }
    return StarbarImages[starType][n].src;
}
function StarbarNoOpinionImage(selected) {
    return STARBAR_IMG_ROOT
        + (selected ? "nop_selected.gif" : "nop_low.gif");
}
function IsClearImageAvailable(imgNum) {
    return (StarbarTypes[imgNum] == STARBAR_TYPE_RATE) || ((StarbarSpecialValues[imgNum] != 0) && (StarbarSpecialValues[imgNum] != STARBAR_NOP_VALUE));
}
function StarbarClearImage(imgNum, selected) {
    return STARBAR_IMG_ROOT 
        + (selected ? "clear_selected.gif" : (IsClearImageAvailable(imgNum) ? "clear_low.gif" : "clear_unavailable.gif"));
}
function StarbarNotInterestedImage(selected) {
    return STARBAR_IMG_ROOT
        + (selected ? "ni_selected.gif" : "ni_low.gif");
}
function StarbarNotInterestedMiniImage(selected) {
    return STARBAR_IMG_ROOT
        + (selected ? "ni_slim_bar_high.gif" : "ni_slim_bar_low.gif");
}
function StarbarPreload() {
    // Preload the images that are used for tracking mouse movement.
    // Note that this is only called if there is a starbar on the page,
    // so it is safe to include this on every page.
    if (! StarbarImages) {
        StarbarImages = new Array();
        for (var j = 0; j <= STARBAR_TYPE_MAX; j++) {
            StarbarImages[j] = new Array();
        }
        for (var j = STARBAR_TYPE_RATE; j <= STARBAR_TYPE_RATE; j++) {
        //for (j = 0; j <= STARBAR_TYPE_MAX; j++) {
            for (var i = 1; i <= STARBAR_STARS_PER_BAR; i++) {
                StarbarImages[j][i] = new Image(STARBAR_WIDTH, STARBAR_HEIGHT);
                StarbarImages[j][i].src = StarbarImageName(j, 10*i);
            }
        }
        StarbarEnabled = true;
    }
}
var StarbarTooltip = new Array();
StarbarTooltip[STARBAR_CLEAR_VALUE] = 'Click to forget your rating';
StarbarTooltip[STARBAR_NOP_VALUE] = 'Click to rate the movie "No Opinion"';
StarbarTooltip[STARBAR_NI_VALUE] = 'Click to rate the movie "Not Interested"';
StarbarTooltip[1] = 'Click to rate the movie "Did Not Like It"';
StarbarTooltip[2] = 'Click to rate the movie "Just OK"';
StarbarTooltip[3] = 'Click to rate the movie "Liked It"';
StarbarTooltip[4] = 'Click to rate the movie "Really Liked It"';
StarbarTooltip[5] = 'Click to rate the movie "Loved It"';
//
// Place to store state about all the starbars on the page
//
var StarbarCount = 0;
var StarbarItemIds = new Array();
var StarbarTypes = new Array();
var StarbarNumStars = new Array();
var StarbarRefresh = new Array();
var StarbarTimers = new Array();
var StarbarPredictions = new Array();
var StarbarSpecialValues = new Array();
var StarbarLastEntered = -1;
//
// Interaction functions
//
var StarbarEnabled = false;
//
function StarbarMouseOver(imgNum, whichStar) {
    // Cancel any background request to restore this image.
    if (StarbarTimers[imgNum] != 0) {
        window.clearTimeout(StarbarTimers[imgNum]);
        StarbarTimers[imgNum] = 0;
    }
    // If we left an image, restore it right now.
    if (StarbarLastEntered >= 0 && StarbarLastEntered != imgNum) {
        StarbarRestore(StarbarLastEntered);
    }
    // If we're now over one of the special buttons,
    // and we were previously on some othe part of this widget,
    // make sure we restore the stars.
    if (StarbarLastEntered >= 0
            && StarbarLastEntered == imgNum
            && whichStar < 0) {
        StarbarRestore(StarbarLastEntered);
    }
    StarbarLastEntered = imgNum;
    // Make the starbar show appropriate feedback.
    if (whichStar > 0) {
        document.images["starbar"+imgNum].src = StarbarImage(STARBAR_TYPE_RATE, whichStar);
    } else if (whichStar == STARBAR_NI_VALUE) {
        document.images["starbar"+imgNum].src = StarbarImage(STARBAR_TYPE_EMPTY, 0);
    } else if (whichStar == STARBAR_NOP_VALUE) {
        document.images["starbar"+imgNum].src = StarbarImage(STARBAR_TYPE_PREDICT, StarbarPredictions[imgNum]);
    } else if (whichStar == STARBAR_CLEAR_VALUE && IsClearImageAvailable(imgNum)) {
        document.images["starbar"+imgNum].src = StarbarImage(STARBAR_TYPE_PREDICT, StarbarPredictions[imgNum]);
        document.images["starbar_clear"+imgNum].src = StarbarClearImage(imgNum, true);
    } else {
        //
    }
    if (document.images["starbar_nop"+imgNum]) {
        document.images["starbar_nop"+imgNum].src = StarbarNoOpinionImage((whichStar == STARBAR_NOP_VALUE));
    }
    if (document.images["starbar_ni"+imgNum]) {
        document.images["starbar_ni"+imgNum].src = StarbarNotInterestedImage((whichStar == STARBAR_NI_VALUE));
    }
    if (document.images["starbar_ni_mini"+imgNum]) {
        document.images["starbar_ni_mini"+imgNum].src = StarbarNotInterestedMiniImage((whichStar == STARBAR_NI_VALUE));
    }
    // Overwrite the ugly link text in the status region.
    window.status = StarbarTooltip[whichStar];
    return false;
}
function StarbarRestore(imgNum) {
    // Restore the starbar state.
    if (StarbarSpecialValues[imgNum] == STARBAR_NI_VALUE) {
        StarbarTypes[imgNum] = STARBAR_TYPE_EMPTY;
    }
    document.images["starbar"+imgNum].src = StarbarImage(StarbarTypes[imgNum], StarbarNumStars[imgNum]);
    if (document.images["starbar_clear"+imgNum]) {
        document.images["starbar_clear"+imgNum].src = StarbarClearImage(imgNum, false);
    }
    if (document.images["starbar_nop"+imgNum]) {
        document.images["starbar_nop"+imgNum].src = StarbarNoOpinionImage((StarbarSpecialValues[imgNum] == STARBAR_NOP_VALUE));
    }
    if (document.images["starbar_ni"+imgNum]) {
        document.images["starbar_ni"+imgNum].src = StarbarNotInterestedImage((StarbarSpecialValues[imgNum] == STARBAR_NI_VALUE));
    }
    if (document.images["starbar_ni_mini"+imgNum]) {
        document.images["starbar_ni_mini"+imgNum].src = StarbarNotInterestedMiniImage((StarbarSpecialValues[imgNum] == STARBAR_NI_VALUE));
    }
    StarbarTimers[imgNum] = 0;
    if (StarbarLastEntered == imgNum) {
        StarbarLastEntered = -1;
    }
    window.status = "";
}
function StarbarMouseOut(whichStar) {
    // Restore the image to the saved state, once a little time has elapsed.
    var imgNum = StarbarLastEntered;
    if (imgNum < 0) {
        return void(0);
    }
    if (! StarbarTimers[imgNum]) {
        StarbarTimers[imgNum] = window.setTimeout("StarbarRestore("+imgNum+")", 100);
    }
    window.status = "";
}
function StarbarClick(whichStar) {
    var itemId;
    var rateHref;
    var rateWindow;
    var imgNum = StarbarLastEntered;
    if (! StarbarEnabled || imgNum < 0) {
        return void(0);
    }
    StarbarEnabled = false;
    itemId = StarbarItemIds[imgNum];
    // Update the saved state of the starbar and the display
    if (whichStar == STARBAR_NI_VALUE) {
        rateHref = "&movieid="+itemId+"&value="+"norec";
        StarbarTypes[imgNum] = STARBAR_TYPE_EMPTY;
        StarbarNumStars[imgNum] = StarbarPredictions[imgNum];
        StarbarSpecialValues[imgNum] = whichStar;
    } else if (whichStar == STARBAR_NOP_VALUE) {
        rateHref = "&movieid="+itemId+"&value="+"noseen";
        StarbarTypes[imgNum] = STARBAR_TYPE_PREDICT;
        StarbarNumStars[imgNum] = StarbarPredictions[imgNum];
        StarbarSpecialValues[imgNum] = whichStar;
    } else if (whichStar == STARBAR_CLEAR_VALUE) {
        if ((StarbarTypes[imgNum] != STARBAR_TYPE_RATE)
             && (StarbarSpecialValues[imgNum] == 0)) {
            StarbarEnabled = true;
            return void(0);
        }
        rateHref = "&movieid="+itemId+"&value="+"clear";
        StarbarTypes[imgNum] = STARBAR_TYPE_PREDICT;
        StarbarNumStars[imgNum] = StarbarPredictions[imgNum];
        StarbarSpecialValues[imgNum] = 0;
    } else {
        rateHref = "&movieid="+itemId+"&value="+whichStar;
        StarbarTypes[imgNum] = STARBAR_TYPE_RATE;
        StarbarNumStars[imgNum] = whichStar;
        StarbarSpecialValues[imgNum] = 0;
    }
    rateHref = STARBAR_SET_PAGE + rateHref +"&url=" + escape(window.location.href);
    window.setTimeout("StarbarRestore("+imgNum+")", 10);
    // StarbarRestore(imgNum);
    // Display any popups
    if (doRatingsPopup == "true") {
        showRatingsPop();
        doRatingsPopup = "false";
    }
    // Save the rating.  
    if (StarbarRefresh[imgNum]) {
        // Must refresh this page
        window.location.href = rateHref;
        StarbarEnabled = true;
        return void(0);
    }
    // Try to use a 204 No Content response.
    if (1) {
        window.location.href = rateHref
                               + "&ncok=true";
        StarbarEnabled = true;
        return void(0);
    }
    // Try to use an IFRAME.
    if (window.callback_iframe) {
        window.callback_iframe.location.href = rateHref+"&iframe=t";
        // Return special value to leave this window alone
        StarbarEnabled = true;
        return void(0);
    }
    // If that failed, try using a pop-up window.
    rateWindow =
        window.open("",
                    "nf_gauge_set",
                    "resizable=no,dependent=yes,width=1,height=1,screenX="
                    +window.screenX+",screenY="+window.screenY
                    +",top="+window.screenX+",left="+window.screenY);
    if (rateWindow && ! rateWindow.closed) {
        //rateWindow.blur();
        rateWindow.location.href = rateHref+"&js=t";
        //self.focus();
        StarbarEnabled = true;
        return void(0);
    }
    // If that failed, run in this window.
    window.location.href = rateHref;
    StarbarEnabled = true;
    return void(0);
}
//
// Starbar creation
//
function StarbarInsert1(imgNum, itemId, starType, numStars) {
    // Emit the HTML
    with (document) {
        if (itemId < 0) {
            // No real itemID, so just a non-interactive image
            write("<img src='"
                  + StarbarImage(starType, numStars)
                  + "' alt='"
                  + numStars
                  + "-star' width=92 height=15 border=0>");
        } else {
            // Only integral input allowed.
            // Associate the gap between stars with the star just to the left of the gap.
            write("<map name='starbar"
                  + imgNum
                  + "'><area href='javascript:StarbarClick(1);' alt='Click to rate the movie \"Did Not Like It\"' onMouseOver='StarbarMouseOver("
                  + imgNum
                  + ",1);' onMouseOut='StarbarMouseOut(1);' shape='rect' coords='0,0,18,14'><area href='javascript:StarbarClick(2);' alt='Click to rate the movie \"Just OK\"' onMouseOver='StarbarMouseOver("
                  + imgNum
                  + ",2);' onMouseOut='StarbarMouseOut(2);' shape='rect' coords='19,0,37,14'><area href='javascript:StarbarClick(3);' alt='Click to rate the movie \"Liked It\"' onMouseOver='StarbarMouseOver("
                  + imgNum
                  + ",3);' onMouseOut='StarbarMouseOut(3);' shape='rect' coords='38,0,56,14'><area href='javascript:StarbarClick(4);' alt='Click to rate the movie \"Really Liked It\"' onMouseOver='StarbarMouseOver("
                  + imgNum
                  + ",4);' onMouseOut='StarbarMouseOut(4);' shape='rect' coords='57,0,75,14'><area href='javascript:StarbarClick(5);' alt='Click to rate the movie \"Loved It\"' onMouseOver='StarbarMouseOver("
                  + imgNum
                  + ",5);' onMouseOut='StarbarMouseOut(5);' shape='rect' coords='76,0,94,14'></map><img name='starbar"
                  + imgNum
                  + "' usemap='#starbar"
                  + imgNum
                  + "' src='"
                  + StarbarImage(starType, numStars)
                  + "' alt='"
                  + numStars
                  + "-star' width=92 height=15 border=0>");
        }
    }
}
function StarbarInsert(itemId, starType,
                       numStars, predictedRating,
                       isNotInterested, isNoOpinion,
                       showNI, showNiMini, showClear, showNoOpinion,
                       refreshWhenChanged) {
    var imgNum = StarbarCount++;
    if (itemId >= 0) {
        // Remember the true state of the starbar.
        StarbarItemIds[imgNum] = itemId;
        StarbarTypes[imgNum] = starType;
        StarbarNumStars[imgNum] = numStars;
        StarbarRefresh[imgNum] = refreshWhenChanged;
        StarbarTimers[imgNum] = 0;
        if (isNotInterested) {
            StarbarSpecialValues[imgNum] = STARBAR_NI_VALUE;
        } else if (isNoOpinion) {
            StarbarSpecialValues[imgNum] = STARBAR_NOP_VALUE;
        } else {
            StarbarSpecialValues[imgNum] = 0;
        }
        StarbarPredictions[imgNum] = predictedRating;
    }
    if (showNI || showNiMini || showClear || showNoOpinion) {
        with (document) {
            if (showNiMini) {
                write("<table cellpadding=0 cellspacing=0 cellborder=0 width=111><tr><td align=right><nobr><a href='javascript:StarbarClick(-1);' onMouseOver='StarbarMouseOver("
                      + imgNum
                      + ",-1)' onMouseOut='StarbarMouseOut(-1)'><img src='"
                      + StarbarNotInterestedMiniImage(isNotInterested)
                      + "' width=19 height=15 border=0 alt='Click to rate the movie \"Not Interested\"' name='starbar_ni_mini"
                      + imgNum
                      + "'></a></nobr></td><td align=left><nobr>");
            } else {
                write("<table cellpadding=0 cellspacing=0 cellborder=0 width=92><tr><td align=left><nobr>");
            }
            StarbarInsert1(imgNum, itemId, (isNotInterested ? STARBAR_TYPE_EMPTY : starType), numStars);
            write("</nobr></td></tr>");
            if (showNI) {
                write("<tr><td height=19 align=center><nobr><a href='javascript:StarbarClick(-1);' onMouseOver='StarbarMouseOver("
					  + imgNum
                      + ",-1)' onMouseOut='StarbarMouseOut(-1)'><img src='"
                      + StarbarNotInterestedImage(isNotInterested)
                      + "' width=92 height=16 border=0 alt='Click to rate the movie \"Not Interested\"' name='starbar_ni"
                      + imgNum
                      + "'></a></nobr></td></tr>");
            }
            if (showClear) {
                write("<tr><td height=19 align=center><nobr><a href='javascript:StarbarClick(-3);' onMouseOver='StarbarMouseOver("
					  + imgNum
                      + ",-3)' onMouseOut='StarbarMouseOut(-3)'><img src='"
                      + StarbarClearImage(imgNum, false)
                      + "' width=92 height=16 border=0 alt='Click to forget your rating' name='starbar_clear"
                      + imgNum
                      + "'></a></nobr></td></tr>");
            }
            if (showNoOpinion) {
                write("<tr><td height=19 align=center><nobr><a href='javascript:StarbarClick(-2);' onMouseOver='StarbarMouseOver("
					  + imgNum
                      + ",-2)' onMouseOut='StarbarMouseOut(-2)'><img src='"
                      + StarbarNoOpinionImage(isNoOpinion)
                      + "' width=92 height=16 border=0 alt='Click to rate the movie \"No Opinion\"' name='starbar_nop"
                      + imgNum
                      + "'></a></nobr></td></tr>");
            }
            write("</table>");
        }
    } else {
        StarbarInsert1(imgNum, itemId, (isNotInterested ? STARBAR_TYPE_EMPTY : starType), numStars);
    }
}
//
function StarBarLikeYou() {
    window.open(STARBAR_MLY_PAGE, 'MLYPoppage',
        'toolbars=0,scrollbars=0,location=0,statusbars=0,menubars=0,resizable=0,width=435,height=300');
    return false;
}

StarbarPreload();
