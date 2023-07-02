import { createWebHashHistory ,createRouter} from "vue-router";
import home from '/resources/js/components/pages/Home.vue';
import about from '/resources/js/components/pages/About.vue';
import classRoom from '/resources/js/components/pages/Class.vue';
import Document from '/resources/js/components/Document/DocumentComponent.vue';

const routes = [
    {
        path : '/',
        name : 'Home',
        component :home,
    },
    {
        path : '/class',
        name : 'Class',
        component :classRoom,
    },
    {
        path:'/about',
        name :'About',
        component:about,
    },
    {
        path:'/doc',
        name:'Doc',
        component:Document,
    }
];
const router = createRouter({
    history: createWebHashHistory(),
    routes,
});
export default router;
