<template>
    <div class="flex flex-col min-h-screen">
        <Navbar />
        <main class="flex-grow">
            <slot /> <!-- This is where your page content will be injected -->
        </main>
        <Footer />
        <BackToTop />
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import axios from 'axios';
import Navbar from './../Navbar.vue';
import Footer from './../Footer.vue';
import BackToTop from './../BackToTop.vue';
// Back to Top Button

// function getUserIP() {
//     // Use a free IP API or get IP from backend if possible
//     return fetch('http://127.0.0.1:8000/?format=json')
//         .then(res => res.json())
//         .then(data => data.ip)
//         .catch(() => null);
// }
//
// function getLocation() {
//     // Use a geo-location API (you can use free services like ipapi.co or ipgeolocation.io)
//     return fetch('https://ipapi.co/json/')
//         .then(res => res.json())
//         .catch(() => ({}));
// }

onMounted(async () => {
    try {
        // const ip = await getUserIP();
        // const location = await getLocation();
            console.log("sdfss ");
        const data = {
            ip: '127.0.0.1',
            route: window.location.pathname,
            user_agent: navigator.userAgent,
            country: 'Country',
            region: 'Region',
            city: 'City',
            postal_code: '12345',
            latitude: 12.345678,
            longitude: 98.7654321,
        };

        await axios.post('/api/visitor', data);

        console.log('Page visit sent:', data);
    } catch (error) {
        console.error('Failed to send page visit', error);
    }
});
</script>
<style>
.back-to-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 50px;
    height: 50px;
    background-color: #10B981;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 999;
}

.back-to-top.active {
    opacity: 1;
    visibility: visible;
}

.back-to-top:hover {
    background-color: #059669;
    transform: translateY(-3px);
}

.nav-active {
    color: #10B981 !important;
    border-bottom: 4px solid #10B981 !important;
}

/* Smooth scroll padding for sections */
section {
    scroll-margin-top: 80px;
}
</style>
