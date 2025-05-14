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
import Navbar from './../Navbar.vue';
import Footer from './../Footer.vue';
import BackToTop from './../BackToTop.vue';
// Back to Top Button

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
