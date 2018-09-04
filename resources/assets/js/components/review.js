Vue.component('review', {
    template: `
        <div class="row">
            <div class="col-md-1">
                <img :src="user_img" :alt="user" class="img-fluid img-thumbnail" />
            </div>
            <div class="col-md-2">
                <h5>{{ user }}</h5>
                {{ rating }}
            </div> 
            <div class="col-md-9">
                {{ text }} <a :href="url">Read more</a>
            </div>
        </div>
    `,
    props: {
        user: { required: true },
        user_img: { required: true },
        rating: { required: true },
        text: { required: true },
        url: { required: true }
    }
});