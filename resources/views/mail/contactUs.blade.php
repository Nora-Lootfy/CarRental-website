Hello Sir😊 <br>
We hope you to have a nice day✨ <br>
<h3>You have received a new message📧</h3> <hr>

<p><strong>From:</strong> {{$contactInfo['first_name'] . ' ' . $contactInfo['last_name']}}</p><hr>
<p><strong>Email:</strong> {{$contactInfo['email']}}</p> <hr>
<strong>Message:</strong>
<p style="padding: 30px">
    {!!  nl2br($contactInfo['message']) !!}
</p>
