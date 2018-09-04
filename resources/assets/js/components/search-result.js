Vue.component('search-result', {
    template: `
    <div class="row">
        <div class="col-md-3">
            <img :src="picture" :alt="name" class="img-fluid img-thumbnail">
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-9 p-2">
                    <h3><a :href="getAlias">{{ name }} </a></h3>   
                    <span class="stars">{{ rating }}</span><br />
                    <strong>Categories: </strong> {{ cats }}
                </div>
                <div class="col-md-3 p-2">
                    <p>{{ phone }} <br />
                    {{ address1 }}<br />
                    {{ city }}, {{ state }}</p>
                </div>
            </div>
        </div>
    </div>
    `,
    props: {
      name: { required: true },
      picture: { required: true },
      rating: { required: true },
      phone: { required: true },
      address1: { required: true },
      city: { required: true },
      state: { required: true },
      alias: { required: true },
      cats: { required: true}
    },
    computed: {
        getAlias(){
            return "businesses/" + this.alias;
        }
    }
});