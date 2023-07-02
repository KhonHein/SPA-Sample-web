<template>
    <div>
        <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
        <div class="about-section border rounded-2">
            <h2 class="text-warning">Laravel 7.^ + Vue.3 </h2>
            <p class="text-info">Example Single Page Application Sample Project.</p>
            <p> All in one , with multi purpose Laravel+Vue Project.</p>
        </div>

        <h3 style="text-align:center" class="fw-bold my-2 text-black">Our Team</h3>
        <div class="row">
            <div class="column" v-for="c in contacts" :key="c">
                <div class="card">
                <img :src="c.imgSrc" class="rounded-1" alt="Jane" style="width:100%">
                <div class="container">
                    <h2>{{ c.name }}</h2>
                    <p class="title">{{ c.position }}</p>
                    <p>{{ c.desc }}</p>
                    <p>{{c.email}}</p>
                    <p><button class="button rounded-2 fw-bold">Contact</button></p>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import '../../../css/About/AboutComponent.css';
    export default {
        data () {
            return {
                contacts:[
                    {
                        id:0,
                        name:'Jane Doe',
                        position:'CEO & Founder',
                        desc:'Some text that describes me lorem ipsum ipsum lorem.',
                        email:'jane@example.com',
                        imgSrc:`https://www.westend61.de/images/0001077564pw/side-view-of-woman-looking-at-view-while-sitting-on-mountain-against-clear-sky-CAVF55466.jpg`,
                    },
                    {
                        id:1,
                        name:'Mike Ross',
                        position:'Art Director',
                        desc:'Some text that describes me lorem ipsum ipsum lorem.',
                        email:'mike@example.com',
                        imgSrc:`https://media.istockphoto.com/id/1137851624/photo/portrait-of-young-woman-on-street.jpg?s=170667a&w=0&k=20&c=TVslAhZXUasoLO9E2xWTSwzGsLTiZWB8lvNbCgxyX9Y=`,

                    },
                    {
                        id:2,
                        name:'John Doe',
                        position:'Designer',
                        desc:'Some text that describes me lorem ipsum ipsum lorem.',
                        email:'hohn@example.com',
                        imgSrc:`https://media.istockphoto.com/id/1492315843/photo/modern-black-executive-masters-the-art-of-multitasking.webp?b=1&s=170667a&w=0&k=20&c=n1IWKLMa3J02yCJDzMNGEwEH4YkR_6Qf3s6rq3TXba4=`,

                    }
                ]
            }
        },
    }
</script>

<style scoped>

</style>
