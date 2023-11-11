<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    // Load Composer's autoloader
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';
    require './PHPMailer/src/Exception.php';
    
    header('Access-Control-Allow-Origin: *'); // You might want to replace * with the specific origin you want to allow

    // Allow methods that can be used for cross-origin requests
    header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
    
    // Allow additional headers
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
    
    // Allow credentials (cookies, authorization headers, etc.)
    header('Access-Control-Allow-Credentials: true');
    
    // Set content type to JSON
    header('Content-Type: application/json');
    
    // Get the JSON data from the raw request body
    $post_data = file_get_contents("php://input");
    
    // Decode the JSON data
    $json_data = json_decode($post_data, true);
    
    // Check if the 'email' key exists in the JSON data
    if (isset($json_data['email'])) {
        $email = $json_data['email'];
        $phone = $json_data['phone'];
        $tourPackage = $json_data['tourPackage'];
        $bookingDate = $json_data['bookingDate'];
        $vehicleType = $json_data['vehicleType'];
        $bookingID = $json_data['bookingID'];
        
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'contact@happyyatratravels.com';
        $mail->Password = 'Umesh@123';
        $mail->SMTPSecure = 'ssl';
        $mail->setFrom('contact@happyyatratravels.com', 'Happy Yatra Travels');
        $mail->addAddress('happyyatratravels@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Order Receipt';
        $mail->Body = '<div class=""><div class="aHl"></div><div id=":aj" tabindex="-1"></div><div id=":a8" class="ii gt" jslog="20277; u014N:xr6bB; 1:WyIjdGhyZWFkLWY6MTc4MjA1Nzk5NTAwNDAzODU2MCJd; 4:WyIjbXNnLWY6MTc4MjA1Nzk5NTAwNDAzODU2MCJd"><div id=":a7" class="a3s aiL msg786297689978477055"><u></u>
<div style="margin:0;padding:0;color:#7e818c;background-color:#ffff">
    <table width="100%" style="width:100%">
        <tbody>
            <tr style="margin:0;padding:0">
                <td style="padding:0;float:none;margin:0 auto;width:100%" width="100%">
                    <table class="m_786297689978477055mainInner m_786297689978477055cornerBorder" style="float:none;margin:0 auto;width:100%" width="100%">
<tbody><tr>
  <td>
    <table class="m_786297689978477055intoArea" style="text-align:center;width:100%">
                  <tbody><tr>
        <td class="m_786297689978477055headerBar">
          <a id="m_786297689978477055TemplateHeaderUrl">
            <img id="m_786297689978477055TemplateHeaderImage" src="https://happyyatratravels.com/images/email_logo.png" style="width:300px;object-fit:contain" class="CToWUd a6T" data-bit="iit" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 355.6px; top: 52.6px;"><div id=":b4" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download attachment " jslog="91252; u014N:cOuCgd,Kr2w4b,xr6bB; 4:WyIjbXNnLWY6MTc4MjA1Nzk5NTAwNDAzODU2MCJd" data-tooltip-class="a1V" jsaction="JIbuQc:.CLIENT" data-tooltip="Download"><div class="akn"><div class="aSK J-J5-Ji aYr"></div></div></div></div>
          </a>
        </td>
      </tr>
      <tr>
        <td>
          <div class="m_786297689978477055helloUser" style="font-size:30px;font-family:Lato,sans-serif;margin-top:20px;color:#282c3f;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal">
            Hello <span id="m_786297689978477055ReceiverName" style="font-weight:bold">Umesh</span>
                      </div>
        </td>
      </tr>
    </tbody></table>
  </td>
</tr>

                        <tr style="margin:0;padding:0">
                            <td class="m_786297689978477055statusContainer" style="margin:0;padding:0px 40px 20px 40px;margin-top:20px;width:calc(100% - (40px*2))" width="calc(100% - (40*2))">
                                <table style="border-collapse:collapse;border-spacing:0px;margin-top:20px;width:100%">
                                    
   

<tbody><tr style="margin:0;padding:0">
   <td style="margin:0;padding:0;border-spacing:0">
      <table style="border-collapse:collapse;border-spacing:0px;margin:0 auto" width="100%">
         <tbody><tr style="margin:0;padding:0">
            <td class="m_786297689978477055statusGreen" width="calc(100% - (30*2))" style="margin:0;padding:30px;width:calc(100% - (30px*2));padding-top:20px;background-color:#03a685;color:white" bgcolor="#03a685">
               <table style="border-collapse:collapse" width="100%">
                  <tbody><tr style="margin:0;padding:0">
                     <td valign="top" style="margin:0;padding:0">
                        <div class="m_786297689978477055whiteLogo" style="margin:0;padding-top:5px;width:30px;margin-right:20px"> <img style="width:30px;object-fit:contain" src="https://ci5.googleusercontent.com/proxy/9gqYnDE-OwBlS2IUapHmkcKdntz53NTiXEAKEHl5DSYIGPyfiHG2G27ji0FxTCNjmu1REUIVGAiUw1Oq9Jn6TYjlU_-vYA5eK6UIQv_ezQ1vmfgLvhUPkaukAbFx41XhWMPkasNY8iUEId4QAwGSLR7ySmY6kp9LoktrKA6Uw1nQDaDwMm5OYNleJcybNBLfmaMVPNSuT_YTq0uSlw=s0-d-e1-ft#http://assets.myntassets.com/assets/images/retaillabs/2020/2/10/3d5e9899-76a9-4e38-abf5-6c43e04691481581334473847-ic_rad_chk_white-3x.png" class="CToWUd" data-bit="iit">
                        </div>
                     </td>
                     <td valign="top" style="margin:0;padding:0">
                        <table style="border-collapse:collapse" width="100%">
                           <tbody>
                              <tr style="margin:0;padding:0">
                                 <td style="padding:0% 3% 0% 0%" colspan="2">
                                     <p class="m_786297689978477055statusText" style="margin:0;font-family:Lato,sans-serif;color:white;padding:0;float:left;width:100%;font-size:30px;line-height:normal;margin-bottom:8px">
                                       You got a new booking for <strong style="font-family:Lato,sans-serif;letter-spacing:0.5px;font-weight:bold;">'.$tourPackage.'<br/></strong>
                                    </p>
                                    <p id="m_786297689978477055PacketCreationTimeId" style="font-weight:bold;font-family:Lato,sans-serif;opacity:0.8;font-size:20px;color:#fff">on '.$bookingDate.'</p>
                                    <td>
                              </tr>
                              <tr style="margin:0;padding:0">
                                 <td style="padding:0% 3% 0% 0%" colspan="2">
                                    <p class="m_786297689978477055subStatusText" style="line-height:1.38;padding:0;float:left;width:100%;font-size:16px;opacity:0.9;font-family:Lato,sans-serif;margin-top:10px">
                                        Kindly contact the registered phone number below to confirm the booking.
                                    </p>
                                 </td>
                              </tr>
                              <tr style="margin:0;padding:0">
                                                                  <td style="padding:0% 3% 0% 0%" colspan="2">
                                  <a class="m_786297689978477055statusCTA" style="text-decoration:none;float:left;background:white;padding:10px 30px 12px 24px;margin-top:10px;margin-bottom:10px;border-radius:4px;text-transform:uppercase;font-family:Lato,sans-serif;font-size:4px;line-height:4px">
                                 <p id="m_786297689978477055AgentMobileNoId" class="m_786297689978477055trackOrder" style="letter-spacing:0.44px;font-family:Lato,sans-serif;font-weight:bold;font-size:16px;color:black">
                                 '.$phone.'</p>
                                 </a>                                  </td>
                                                               </tr>
                              <tr style="margin:0;padding:0">
                                 <td valign="top" style="padding:0% 3% 0% 0%" colspan="2">
                                    <p style="font-family:Lato,sans-serif;font-size:16px;font-weight:bold;line-height:1.06;opacity:0.9;float:left;margin-top:4px" class="m_786297689978477055commonForShippingLogistic">                                     </p>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody></table>
            </td>
         </tr>
         <tr style="margin:0;padding:0">
            <td style="margin:0;padding:0" width="calc(100% - 2px)">
               <table style="border-collapse:collapse;border:1px solid rgba(40,44,63,0.15);border-top:0" width="100%">
                  <tbody><tr style="margin:0;padding:0">
                                       </tr>
               </tbody></table>
            </td>
         </tr>
                  <tr style="height:16px"></tr>
         
    

<tr>
    <td align="center" valign="top" style="font-size:0">
        <table style="background:#f5f5f6;border-radius:4px;width:100%" border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
            <tbody><tr>
            <td valign="top" class="m_786297689978477055payment-table" style="width:5%;padding:2% 2% 2% 2%"></td>

                    <td valign="top" class="m_786297689978477055section-two" style="padding:2% 2% 2% 0%;line-height:24px">
                        <table style="width:100%;padding:0;margin:0;list-style:none;font-size:16px">
                                          <tbody><tr>
                                                    <td colspan="2" class="m_786297689978477055label1" style="color:#94969f;font-size:20px;letter-spacing:0.39px;font-family:Lato,sans-serif; font-weight:600">Vehicle Type</td>
                                                </tr>
                                            <tr>
                                                <td valign="top" class="m_786297689978477055label2 m_786297689978477055imgTD" style="width:17%">
                                                                <span class="m_786297689978477055imgSpan" style="float:left;margin-right:9px;margin-top:1px">
                                      <img id="m_786297689978477055PaymentModeImageIconId" class="m_786297689978477055paymentModeImageIcon CToWUd" width="100" style="margin-top:10px" src="https://happyyatratravels.com/images/email_suv.png" data-bit="iit">

                                                                </span>
                                                </td>
                                            <td valign="top" class="m_786297689978477055label2" style="color:#3e4152;font-size:21px;font-weight:bold;letter-spacing:0px;font-family:Lato,sans-serif;">
                                                <div style="width:100%;margin-top:20px;">
                                                    
                                                    <span id="m_786297689978477055PaymentOptionNameId">'.$vehicleType.'</span>
                                                </div>
                       
                                                            </td>
                            </tr>
                                                    </tbody></table>
                    </td>
                            </tr>
        </tbody></table>
    </td>
</tr>
               </tbody></table>
   </td>
</tr>
                                </tbody></table>
                            </td>
                        </tr>
                                                                                                                                                                                                                                                 
                        <tr style="margin:0;padding:0">
                            <td style="padding:0;float:none;margin:0 auto;width:100%" width="100%">
                                <table class="m_786297689978477055mainInner" style="float:none;margin:0 auto;width:100%" width="100%">
                                    <tbody><tr style="margin:0;padding:0">
                                        <td class="m_786297689978477055roseContainer" style="margin:0;padding:30px 40px 20px 40px;background-color:#f5f5f6!important;width:calc(100% - (40px*2));border-radius:8px" width="calc(100% - (40*2))">
                                            <table width="100%">
                                                
    

<tbody><tr style="margin:0;padding:0">
    <td class="m_786297689978477055packetIdSection" style="border-bottom-left-radius:0px;border-bottom-right-radius:0px;border-top-left-radius:8px;border-top-right-radius:8px;padding:20px 30px 24px 30px;background-color:white;margin-top:20px;font-size:17px;line-height:23px;color:#7e818c;border:solid 0.5px rgba(190,147,71,0.11);margin:0;border-bottom:solid 0.5px #eaeaec">
        <ul style="margin:0;padding:0;float:left;width:100%;font-family:Lato,sans-serif;list-style:none;line-height:normal">
            <li style="margin:0;padding:0;float:left;width:100%">
                <p class="m_786297689978477055packageOrderTitle" style="margin:0;float:left;width:100%;font-family:Lato,sans-serif;color:#282c3f;font-size:25px">
                    
                    Booking Details
                </p>
            </li>
            <ul style="margin-top:16px!important;padding:0;font-family:Lato,sans-serif;float:left;width:100%;list-style:none;line-height:normal">
                <li class="m_786297689978477055packetOrderId" style="margin:0;padding:0;float:left;width:100%;font-size:15px;color:#94969f;letter-spacing:0.39px">Your Booking Id :
                </li>
                <li class="m_786297689978477055packetOrderIdValue" style="padding:0;float:left;width:100%;font-size:18px;font-family:Lato,sans-serif;color:#282c3f;margin-top:5px;margin-left:0" id="m_786297689978477055OrderId">'.$bookingID.'</li>
            </ul>
        </ul>
    </td>
</tr>
<tr style="margin:0;padding:0">
    <td class="m_786297689978477055productListContainerTD" style="margin:0;padding:20px 30px 24px 30px;background-color:white;border-radius:8px;font-size:17px;line-height:23px;color:#7e818c;border:solid 0.5px rgba(190,147,71,0.11);padding-top:24px;border-top-left-radius:0;border-top-right-radius:0;margin-top:0">
        <ul style="margin:0;font-family:Lato,sans-serif;padding:0;float:left;width:100%;list-style:none;line-height:normal">
            
                                                                                                                                    
                                                            
                                                                <li class="m_786297689978477055productListContainerLastItem" style="margin:0;padding:0;display:block;float:left;width:50%;padding-bottom:20px">
                    
                    <p id="m_786297689978477055ItemProductBrandName-9655197675" class="m_786297689978477055brandName" style="max-width:95%;display:inline-block;white-space:nowrap;text-overflow:ellipsis;font-stretch:normal;font-style:normal;line-height:normal;color:#282c3f;font-family:Lato,sans-serif;font-weight:600;letter-spacing:0.29px;font-size:18px;margin-top:3px; margin-bottom:2px">E-Mail ID: <span style="font-weight:500">'.$email.'</span></p>
                    <p id="m_786297689978477055ItemProductBrandName-9655197675" class="m_786297689978477055brandName" style="max-width:100%;display:inline-block;white-space:nowrap;text-overflow:ellipsis;font-stretch:normal;font-style:normal;line-height:normal;color:#282c3f;font-family:Lato,sans-serif;font-weight:600;letter-spacing:0.29px;font-size:18px;margin-top:10px; margin-bottom:2px">Phone: <span style="font-weight:500">+91-'.$phone.'</span></p>
                    </li>
            </ul>
    </td>
</tr>
    <tr style="margin:0;padding:0">
        <td style="margin:0;padding:0">
            <div>
                <div class="m_786297689978477055halfWidgetsCollectionTable" style="display:table;margin:20px 0;width:100%">

                    
                    
                    

                                        

                        <div class="m_786297689978477055halfWidgetsCollectionTableCell" id="m_786297689978477055MyntraInsiderBlockId" style="display:table-cell;width:50%;background-repeat:no-repeat;background-size:32px;background-position:right 16px top 16px;background-image:url();border:solid 0.5px rgba(190,147,71,0.11);border-radius:4px;background-color:#fff5e1">
                            <div class="m_786297689978477055widgetContainerInfo" style="margin:0;font-size:17px;line-height:23px;color:#7e818c;padding:20px 20px 20px 20px">
                                <p class="m_786297689978477055informationTitle" style="margin:0;padding:0;width:100%;font-family:Lato,sans-serif;font-size:25px;margin-bottom:16px;font-weight:normal;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal;color:#be9347">
                                    Diwali Offers
                                    <span style="float:right">
                                    <img src="https://ci5.googleusercontent.com/proxy/wyvWG5NSlVy0BVqC7zzsMb0g2a1yNJ-vRLL8mXDY9w3TYfujzc1MCYkmW7k7IZhkU54I1JOMvrP6xwk0Hxr4PBW7uC4yQFoDcIdWdLN6Ekb8NtlsJzJbHhp9g4YdGOuJEsEh6QuiAeFdeFi8H-kGpGgQhmHgPOnCynKKcwscjyJzDCv4AmoYX_svrF4C9rUEdOqYF50vL673FusUgp_I=s0-d-e1-ft#https://assets.myntassets.com/assets/images/retaillabs/2021/8/16/ab9d2d54-ae28-4194-85e7-5b3f0258ad491629102729570-Insider-Stroke-crown.png" style="width:28px;object-fit:contain" class="CToWUd" data-bit="iit">
                                </span>
                                </p>
                                <p class="m_786297689978477055earnedPoints" style="margin:0;padding:0;width:100%;font-family:Lato,sans-serif;font-size:16px;font-weight:normal;font-stretch:normal;font-style:normal;line-height:1.38;letter-spacing:normal;color:#535766">
                                    Plan your vacation with us this Diwali and get ₹500 Loyality Discount</strong>
                                                                    for this order. </p>
                                <p class="m_786297689978477055myntraPoint" style="margin:0;padding:0;width:100%;font-family:Lato,sans-serif;font-size:12px;font-weight:normal;font-stretch:normal;font-style:normal;line-height:1.33;letter-spacing:normal;color:#7e818c;margin-top:16px">
                                                                            * These Loyality Discount will get applied once you confirm the order.
                                                                    </p>
                            </div>
                        </div>
                    
                                    </div>
        
                
                                    <div class="m_786297689978477055onlyDesktop" style="width:calc(100% - 4px);margin:0 2px;border-bottom:1px solid #ddd">
                    </div>
                

                                                                    
                






                
                <div class="m_786297689978477055halfWidgetsCollectionTable" style="display:table;margin:20px 0;width:100%">
                                        
                                                                <div class="m_786297689978477055halfWidgetsCollectionTableCell" id="m_786297689978477055WhatNextBlockId" style="display:table-cell;width:50%;background-repeat:no-repeat;background-size:32px;background-position:right 16px top 16px;background-image:url();border:solid 0.5px rgba(190,147,71,0.11);border-radius:4px;font-size:17px;line-height:23px;color:#7e818c;background-color:#ffffff">
                            <div class="m_786297689978477055widgetContainerInfo" style="margin:0;padding:20px 20px 20px 20px">
                                                                <p class="m_786297689978477055informationTitle" style="margin:0;padding:0;width:100%;font-family:Lato,sans-serif;color:#282c3f;font-size:25px;margin-bottom:16px;font-weight:normal;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal">Info</p>
                                <p class="m_786297689978477055informationSubTitle" style="margin:0;padding:0;width:100%;font-family:Lato,sans-serif;font-size:16px;line-height:1.38;letter-spacing:0.29px;font-weight:normal;font-stretch:normal;font-style:normal;color:#3e4152">
                                                                                                                        Our executive will call you shortly to confirm the order.
                                                                                                            </p>
                            </div>
                        </div>
                        <div class="m_786297689978477055halfWidgetsCollectionTableCell m_786297689978477055onlyDesktop" style="background-color:transparent;width:0;padding:0 10px;display:table-cell"></div>
                    
                                                                    <div class="m_786297689978477055halfWidgetsCollectionTableCell" id="m_786297689978477055MyntraQueryBlockId" style="display:table-cell;width:50%;padding:0;background-repeat:no-repeat;background-size:32px;background-position:right 16px top 16px;background-image:url();border:solid 0.5px rgba(190,147,71,0.11);border-radius:4px;font-size:17px;line-height:23px;color:#7e818c;background-color:#ffffff">
                            <div class="m_786297689978477055widgetContainerInfo" style="margin:0;padding:20px 20px 20px 20px">
                                <p class="m_786297689978477055informationTitle" style="margin:0;padding:0;width:100%;font-family:Lato,sans-serif;color:#282c3f;font-size:25px;margin-bottom:16px;font-weight:normal;font-stretch:normal;font-style:normal;line-height:normal;letter-spacing:normal">
                                    Need help?
                                </p>
                                <p class="m_786297689978477055informationSubTitle" style="margin:0;padding:0;width:100%;font-family:Lato,sans-serif;font-size:16px;line-height:1.38;letter-spacing:0.29px;font-weight:normal;font-stretch:normal;font-style:normal;color:#3e4152">
                                    For queries, or any assistance
                                    <a id="m_786297689978477055ContactUsLinkId" href="htel://9863789990" style="color:#14bf98;text-decoration:none;background-color:transparent" target="_blank" data-saferedirecturl="htel://9863789990">contact&nbsp;us</a>
                                </p>
                            </div>
                        </div>
                                    </div>

                </div>
                

            </div>
        </td>
    </tr>

                                            </tbody></table>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>

                                            </tbody></table>
                </td>
            </tr>
        </tbody>
    </table>
';
        
        try {
            $mail->send();
            $response = array('Status' => 'Email Sent');
            echo json_encode($response);
        } catch (Exception $e) {
            $response = array('Status' => "Error: Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            echo json_encode($response);
        }
    } else {
        $response = array('Status' => 'Error: Email not provided in the JSON data.');
        echo json_encode($response);
    }
?>
