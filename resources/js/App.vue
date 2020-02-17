<template>
    <div id="notifications"></div>
</template>
<script>
    export default {
        data() {
            return {
                notifications: []
            }
        },
        created: function(){
            if(window.location.pathname == '/'){
                axios.get('/api/list').then(resp => {
                    if(_.isObject(resp.data)){
                        this.notifications = resp.data;
                        const showNotifications = () => {
                            $('#notifications').removeClass('show');
                            var t = this;
                            setTimeout(function(){
                                var current = t.notifications[0];
                                t.notifications.splice(0, 1);
                                if(!_.isUndefined(current)){
                                    $('#notifications').html("<h3>" + current.title + "</h3><p>" + current.description + "</p>").addClass('show');
                                    axios.post('/api/viewed/' + current.id);
                                }
                            }, 1000);

                        };
                        setInterval(showNotifications ,7000)
                    }
                });
            }
        }
    }
</script>
