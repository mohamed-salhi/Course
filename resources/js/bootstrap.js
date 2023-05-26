import _ from 'lodash';
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
    key: 'laravelwebsocetkey',
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
});




window.Echo.private(`chat_group`)
    .listen('chat', (e) => {
     console.log(e.massage.created_at);
            $(document).scrollTop($(document).height());
            if (e.massage.admin_id == id){
                $('#chat-content').append(`
                                        <li class="d-flex justify-content-between mb-4">
                                                <img src="http://127.0.0.1:8000/upload/images/admin/${e.image}" alt="avatar"
                                                     class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                                                   <div class="card w-100">
                                                    <div class="card-header d-flex justify-content-between p-3">
                                                        <p class="fw-bold mb-0">${e.name}</p>
                                                        <p class="text-muted small mb-0"><i class="far fa-clock"></i> 1 minutes ago</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="mb-0">
                                                              ${e.massage.message}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
        `)
            }else{
                $('#chat-content').append(`


                                                  <li class="d-flex justify-content-between mb-4">
                                                <div class="card w-100">
                                                    <div class="card-header d-flex justify-content-between p-3">
                                                        <p class="fw-bold mb-0">${e.name}</p>
                                                        <p class="text-muted small mb-0"><i class="far fa-clock"></i> 1 minutes ago</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="mb-0">
                                                              ${e.massage.message}
                                                        </p>
                                                    </div>
                                                </div>
                                                <img src="http://127.0.0.1:8000/upload/images/admin/${e.image}" alt="avatar"
                                                     class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                                            </li>




        `)
            }
    }
    )

window.Echo.private(`map`)
    .listen('mapp', (e) => {
            console.log('edddd');
            console.log(e);
            console.log(e.lat);
            L.marker([e.lon, e.lat]).addTo(map)
                .bindPopup('')
                .openPopup();
        }
    )

console.log('e');


window.Echo.join(`online`)
    .joining((user) => {
        $('#chat-content').append(`

                                               <li class="d-flex justify-content-between mb-4">
                                                    <div class="card w-100">
                                                        <div class="card-body">
                                                            <p class="mb-0">
                                                                ${user.name} joing
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
        `)
    })
    .leaving((user) => {
            $('#chat-content').append(`
                  <li class="d-flex justify-content-between mb-4">
                       <div class="card w-100">
                           <div class="card-body">
                               <p class="mb-0">
                                   ${user.name} left
                               </p>
                           </div>
                       </div>
                   </li>



        `)


    })
    .error((error) => {
        console.error('rewr');
    });

