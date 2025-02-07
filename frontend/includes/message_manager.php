<?php
session_start();

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    
    echo '<div id="message" class="alert alert-' . htmlspecialchars($message['type']) . '">';
    echo htmlspecialchars($message['description']);
    echo '</div>';
    
    unset($_SESSION['message']);
}
?>

<style>
    #message {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #f8d7da;
        color: #721c24;
        padding: 15px;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        z-index: 9999;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: none;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }
    
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-info {
        background-color: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }

    .alert-warning {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            top: 0;
        }
        to {
            opacity: 1;
            top: 20px;
        }
    }
</style>

<script>
    window.onload = function() {
        var messageElement = document.getElementById('message');
        
        if (messageElement) {
            messageElement.style.display = 'block';
            messageElement.style.opacity = '1';
            messageElement.style.animation = 'fadeIn 0.5s ease-in-out';
            
            setTimeout(function() {
                messageElement.style.opacity = '0';
                messageElement.style.transition = 'opacity 0.5s ease-in-out';
                setTimeout(function() {
                    messageElement.style.display = 'none';
                }, 500);
            }, 5000);
        }
    };
</script>
