# Laravel E-Commerce Technical Assessment

A full-stack e-commerce application built with **Laravel**, **Livewire**, and **Tailwind CSS**. This project demonstrates a shopping cart system with real-time stock management, background email processing, and automated reporting.

## 🚀 Features implemented

-   **Product Catalog:** Browse products with visual stock status indicators.
-   **Dynamic Shopping Cart:**
    -   Powered by **Livewire** (SPA-like experience without page reloads).
    -   Real-time quantity updates and subtotal calculations using Computed Properties.
-   **Robust Checkout System:**
    -   Uses **Database Transactions** to ensure inventory and order accuracy.
    -   Prevents race conditions during simultaneous purchases.
-   **Automated Low Stock Alerts:**
    -   Triggered via **Queued Jobs** for performance (non-blocking UI).
    -   Sends an email notification when stock falls below 5 items.
-   **Daily Sales Report:**
    -   **Task Scheduler** command runs daily at 11:00 PM.
    -   Generates and emails a detailed HTML report of the day's revenue and orders.

## 🛠 Tech Stack

-   **Framework:** Laravel 11
-   **Frontend:** Blade + Livewire 3 + Tailwind CSS
-   **Database:** MySQL
-   **Queue Driver:** Database (for local testing)

---

## ⚙️ Installation & Setup

Follow these steps to get the project running on your local machine.

### 1. Clone the repository
```bash
git clone [https://github.com/AboNady/Laravel-Task.git](https://github.com/AboNady/Laravel-Task.git)
cd ecommerce-test
