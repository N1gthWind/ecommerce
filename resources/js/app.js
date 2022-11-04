import "./bootstrap";

// Bootstrap CSS
import "../css/admin/bootstrap.min.css";

// // Icon CSS
// import '../css/admin/icons.min.css';

// App CSS
import "../css/admin/app.min.css";

// Custom CSS
import "../css/admin/custom.css";
import "remixicon/fonts/remixicon.css";

import * as bootstrap from "bootstrap";
import "vue-toastification/dist/index.css";


import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import { Inertia } from "@inertiajs/inertia";
import Toast from "vue-toastification";
// Import the CSS or use your own!


const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(Toast)
            .mount(el);

    },
});

InertiaProgress.init({ color: "#4B5563" });
