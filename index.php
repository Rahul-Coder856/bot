<?php
// টেলিগ্রাম বটের API টোকেন যোগ করুন
$apiToken = "YOUR_BOT_API_TOKEN";

// টেলিগ্রাম থেকে আসা JSON আপডেট ডেটা গ্রহণ
$update = file_get_contents("php://input");
$updateArray = json_decode($update, TRUE);

// ইউজারের চ্যাট আইডি এবং পাঠানো বার্তা খুঁজে বের করুন
$chatId = $updateArray["message"]["chat"]["id"];
$message = $updateArray["message"]["text"];

// বটের জবাব নির্ধারণ
if($message == "/start"){
    $reply = "স্বাগতম! আমি আপনার টেলিগ্রাম বট।";
} elseif ($message == "Hi") {
    $reply = "Hello!";
} else {
    $reply = "আপনার পাঠানো মেসেজ: $message";
}

// টেলিগ্রাম API এর মাধ্যমে জবাব পাঠানো
file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$chatId&text=".urlencode($reply));

?>
