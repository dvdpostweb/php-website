<?php
$email_text = '       
              </tr>
              <tr id="promo">ff
              f
                <td bgcolor="#bacc38" ><table>
                    <tr>
                      <td width="25"></td>
                      <td width="555" id="promo_td"><p> <strong>- votre promotion : </strong> $$$promotion$$$<br />
                      </p></td>
                    </tr>
                  </table>
                <td>
              </tr>
              dddd
              <tr>
                <td height="25"></td>
              </ tr>
              <tr>
                <td bgcolor="#bbddef" ><table>
                    <tr>
                      <td width="25"></td>
                      <td width="999">                  <p><strong>- les donn&eacute;es du service client&egrave;le :</strong>  contactez-nous par t&eacute;l&eacute;phone <br />
                        au 0800/ 95 990 ou
                   par mail via <a href="http://private.dvdpost.com/fr/messages" style="color: rgb(254, 14, 0); text-decoration: underline;" target="_blank" ><strong>la messagerie de votre compte</strong></a></p>
                  
</td>
                    </tr>
                  </table>';
                  echo '<pre>'.$email_text.'</pre>';
                  echo 'okokokokoko';
$email_text = preg_replace('/<tr id="promo">(.*)<\/ tr>/s', '',$email_text);
echo '<pre>'.$email_text.'</pre>';
?>