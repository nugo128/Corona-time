<div style="font-family: Arial, sans-serif; text-align: center;">
  <img src="../../../public/images/email.png" alt="dashboard" style="max-width: 100%; height: auto;">
  <h2 style="font-size: 24px; margin: 20px 0 10px;">Confirmation email</h2>
  <p style="font-size: 16px; margin: 10px 0;">Click button to verify your email</p>
  <button style="background-color: #4CAF50; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 10px 0; border-radius: 5px;">
    <a href="{{ route('confirm', $user->confirmation_token) }}" style="color: white; text-decoration: none;">Activate your account</a>
  </button>
</div>
