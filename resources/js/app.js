import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Echo.channel('ChatChannel')
  .listen('PushMessage', (e) => {
      console.log(e);
      var event = new CustomEvent('postmessage');
      window.dispatchEvent(event);
  });