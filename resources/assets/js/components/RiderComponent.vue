<template>
    <div>
        <div>
            <h1>Rider details</h1>
        </div>
        <div>
             <h2>{{rider.name}}</h2>
             <p>Bib number: {{rider.bib_number}}</p>
             <p>Finish time: {{rider.finish_time}}</p>
             <p>Finish time crossing time: </p>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default{

        data() {
            return {
                rider: []
            }
        },
        created() {
            axios.get(`/api/rider/999999195DB36C00000801F2`)
            .then(response => {
                // JSON responses are automatically parsed.
                //console.log(response.data.data)
                this.rider = response.data.data
            });
        }
    }
</script>