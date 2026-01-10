/**
 * Custom Notification System
 * Premium notification/toast system with animations
 * 
 * Usage:
 * showNotification(message, type, options)
 * showError(message, options)
 * showSuccess(message, options)
 * showInfo(message, options)
 * showWarning(message, options)
 */

(function () {
    'use strict';

    // Configuration
    const CONFIG = {
        defaultDuration: 5000,
        positions: ['top-center', 'top-right', 'bottom-center', 'bottom-right'],
        maxNotifications: 5
    };

    // Notification queue
    let notificationQueue = [];
    let activeNotifications = 0;

    /**
     * Initialize notification container
     */
    function initializeContainer() {
        if (document.getElementById('notification-container')) {
            return;
        }

        const container = document.createElement('div');
        container.id = 'notification-container';
        container.className = 'notification-container';
        document.body.appendChild(container);
    }

    /**
     * Get icon SVG for notification type
     */
    function getIcon(type) {
        const icons = {
            error: `<svg class="notification-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>`,
            success: `<svg class="notification-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>`,
            info: `<svg class="notification-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>`,
            warning: `<svg class="notification-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>`
        };
        return icons[type] || icons.info;
    }

    /**
     * Create notification element
     */
    function createNotification(message, type, options) {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type} notification-enter`;

        const content = `
            <div class="notification-content">
                <div class="notification-icon-wrapper">
                    ${getIcon(type)}
                </div>
                <div class="notification-message">${message}</div>
                ${options.dismissible !== false ? `
                    <button class="notification-close" aria-label="Close">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                ` : ''}
            </div>
        `;

        notification.innerHTML = content;
        return notification;
    }

    /**
     * Show notification
     */
    function showNotification(message, type = 'info', options = {}) {
        // Validate type
        if (!['error', 'success', 'info', 'warning'].includes(type)) {
            type = 'info';
        }

        // Merge options with defaults
        options = {
            duration: type === 'error' ? 6000 : CONFIG.defaultDuration,
            dismissible: true,
            position: 'top-center',
            ...options
        };

        // Initialize container if needed
        initializeContainer();

        const container = document.getElementById('notification-container');

        // Create notification element
        const notification = createNotification(message, type, options);

        // Add to DOM
        container.appendChild(notification);
        activeNotifications++;

        // Trigger animation
        setTimeout(() => {
            notification.classList.remove('notification-enter');
            notification.classList.add('notification-visible');
        }, 10);

        // Setup close button
        if (options.dismissible !== false) {
            const closeBtn = notification.querySelector('.notification-close');
            closeBtn.addEventListener('click', () => {
                dismissNotification(notification);
            });
        }

        // Auto-dismiss
        if (options.duration > 0) {
            setTimeout(() => {
                dismissNotification(notification);
            }, options.duration);
        }

        // Limit max notifications
        if (activeNotifications > CONFIG.maxNotifications) {
            const oldestNotification = container.querySelector('.notification');
            if (oldestNotification) {
                dismissNotification(oldestNotification);
            }
        }

        return notification;
    }

    /**
     * Dismiss notification
     */
    function dismissNotification(notification) {
        if (!notification || !notification.parentElement) {
            return;
        }

        notification.classList.remove('notification-visible');
        notification.classList.add('notification-exit');

        setTimeout(() => {
            if (notification.parentElement) {
                notification.parentElement.removeChild(notification);
                activeNotifications = Math.max(0, activeNotifications - 1);
            }
        }, 300);
    }

    /**
     * Dismiss all notifications
     */
    function dismissAll() {
        const container = document.getElementById('notification-container');
        if (!container) return;

        const notifications = container.querySelectorAll('.notification');
        notifications.forEach(notification => {
            dismissNotification(notification);
        });
    }

    // Shorthand methods
    function showError(message, options = {}) {
        return showNotification(message, 'error', options);
    }

    function showSuccess(message, options = {}) {
        return showNotification(message, 'success', options);
    }

    function showInfo(message, options = {}) {
        return showNotification(message, 'info', options);
    }

    function showWarning(message, options = {}) {
        return showNotification(message, 'warning', options);
    }

    // Expose to window
    window.showNotification = showNotification;
    window.showError = showError;
    window.showSuccess = showSuccess;
    window.showInfo = showInfo;
    window.showWarning = showWarning;
    window.dismissNotification = dismissNotification;
    window.dismissAllNotifications = dismissAll;

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeContainer);
    } else {
        initializeContainer();
    }

})();
