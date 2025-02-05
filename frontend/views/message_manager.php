<?php
session_start();

if (isset($_SESSION['message'])) {
    // Récupère le message et le type depuis la session
    $message = $_SESSION['message'];
    
    // Affiche le message avec le type approprié
    echo '<div id="message" class="alert alert-' . htmlspecialchars($message['type']) . '">';
    echo htmlspecialchars($message['description']);
    echo '</div>';
    
    // Supprime le message de la session après l'affichage
    unset($_SESSION['message']);
}
?>

<!-- Ajout du code CSS et JavaScript dans la même page -->
<style>
    /* Styles pour le message flottant */
    #message {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #f8d7da; /* Couleur de fond pour un message d'erreur */
        color: #721c24; /* Couleur du texte pour l'erreur */
        padding: 15px;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        z-index: 9999;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: none; /* Initialement masqué */
        opacity: 0; /* Pour l'animation */
        transition: opacity 0.5s ease-in-out; /* Transition pour l'apparition et la disparition */
    }
    
    /* Styles pour un message de succès */
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    /* Styles pour un message d'information */
    .alert-info {
        background-color: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }

    /* Styles pour un message d'avertissement */
    .alert-warning {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
    }

    /* Animation d'apparition */
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
    // Afficher le message dès que la page est chargée
    window.onload = function() {
        var messageElement = document.getElementById('message');
        
        // Vérifie si le message existe
        if (messageElement) {
            // Affiche le message avec animation
            messageElement.style.display = 'block';
            messageElement.style.opacity = '1';
            messageElement.style.animation = 'fadeIn 0.5s ease-in-out';
            
            // Masquer le message après 5 secondes
            setTimeout(function() {
                messageElement.style.opacity = '0';
                messageElement.style.transition = 'opacity 0.5s ease-in-out';
                setTimeout(function() {
                    messageElement.style.display = 'none';
                }, 500); // Cacher après l'animation
            }, 5000); // 5 secondes avant de commencer à disparaître
        }
    };
</script>
