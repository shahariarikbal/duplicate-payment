# Laravel Middleware: Prevent Duplicate Payment Submissions

This middleware is designed to **prevent duplicate payment submissions** by temporarily caching a payment request using the user ID and amount as a unique signature.

## 📌 Purpose

To avoid duplicate payments caused by:

- Accidental double-clicks on the "Pay" button.
- Network delays causing repeated submission.
- Page refreshes after submitting a payment form.

## ⚙️ How It Works

1. **Unique Cache Key** is created using the `user_id` from the request:
    - duplicate_payment_{user_id}

2. **Cache Value** is generated using:
    - payment:{user_id}:{amount}

3. On each request:
- The middleware checks if a cached value already exists.
- If the same request was made within 60 seconds, it is **blocked** and the user is notified with an error:  
  > ❌ *Duplicate payment detected!*
- Otherwise, the request proceeds and is cached for 60 seconds.