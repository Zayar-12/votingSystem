<div>
    <h1>Email Verification</h1>
    <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?</p>

    @if (session('status') == 'verification-link-sent')
        <div style="color: green;">
            A new verification link has been sent to the email address you provided during registration.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">
            Resend Verification Email
        </button>
    </form>
</div>