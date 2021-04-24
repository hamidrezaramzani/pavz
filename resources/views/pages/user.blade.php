<div class="user-call-info mt-4">
    <img src="{{ asset($data->user->profile->image ? 'upload/' . $data->user->profile->image : 'images/user.png') }}"
        alt="">
    <h3>{{ $data->user->profile->fullname }}</h3>
    <br>
    <div class="call-ways">
        <a href="tel://{{ $data->user->phonenumber }}" class="btn btn-sm btn-primary is">
            <i class="fa fa-phone"></i>&nbsp;
            تماس
        </a>
        <a href="https://t.me/{{ $data->user->profile->telegram_id }}" class="btn btn-sm mx-2 btn-primary is">
            <i class="fab fa-telegram"></i>&nbsp;
            تلگرام
        </a>

        <a href="sms://{{ $data->user->phonenumber }}" class="btn btn-sm mx-2 btn-primary is">
            <i class="fa fa-envelope"></i>&nbsp;
            پیامک
        </a>

    </div>
    <br>
    <br>
</div>


<br>
<br>
