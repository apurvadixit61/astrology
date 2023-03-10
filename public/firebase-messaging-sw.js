// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
        apiKey: "AIzaSyC5UhODBBmx_CO43480AoBxcLEWQtf_dss",
        authDomain: "astrologyfcm.firebaseapp.com",
        projectId: "astrologyfcm",
        storageBucket: "astrologyfcm.appspot.com",
        messagingSenderId: "5304372207",
        appId: "1:5304372207:web:c97e81ba86bc06b386441a",
        measurementId: "G-W3L7RJS9TM"
    });

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});