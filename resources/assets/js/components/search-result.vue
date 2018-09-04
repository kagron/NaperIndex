
<template>
    <div class="row">
        <div class="col-md-3">
            <img :src=picture :alt=name class="img-fluid">
        </div>
        <div class="col-md-9 d-flex bd-highlight">
            <div class="p-2 w-100 bd-highlight">
                <h3><a href="#">{{ name }} </a></h3>   
                {{ rating }}<br />
            </div>
            <div class="p-2 flex-shrink-0 bd-hightlight">
                <p>{{ phone }}</p>
                <p>{{ address1 }}</p>
                
            <p>{{ city }}, {{ state }}</p>
            </div>
        </div>
    </div>
</template>
<script>
props: [
      name,
      picture,
      rating,
      phone,
      address1,
      city,
      state
]
</script>