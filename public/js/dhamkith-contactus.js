(function IIFE() {
    "use strict";
    const $locationActionButton = Array.prototype.slice.call(document.querySelectorAll('.location-action-button'), 0);
    const $errorNotifiBox =  Array.prototype.slice.call(document.querySelectorAll('.dha-package-js-notifies'), 0);
  
    function getChildren(n, skipMe) {
        var r = [];
        for ( ; n; n = n.nextSibling )
            if ( n.nodeType == 1 && n != skipMe)
                r.push( n );
        return r;
    }
  
    function getSiblings(n) {
        return getChildren(n.parentNode.firstChild, n);
    }
  
    if($locationActionButton.length > 0) {
  
        $locationActionButton.forEach(el => {
            el.addEventListener( 'click', () => {
                el.offsetParent.parentElement.lastElementChild.classList.toggle('action-active');
  
                const isSibling = getSiblings(el.offsetParent.parentElement);
                isSibling.forEach( el => {
                    if(el.classList.contains('locations-wrapper')) {
                        el.lastElementChild.classList.remove('action-active');
                    }
                });
  
  
            }, false);
        });
    }
  
    /*
    * remove login error message notify box
    */
    if ($errorNotifiBox.length > 0) {
        $errorNotifiBox.forEach( el => {
            el.addEventListener('click', () => {
                const parentNode = el.parentElement;
                parentNode.removeChild(el);
            },false);
        });
    }
  
    
      /*
      * select messages
      */ 
      let ids = Array();
      const $allMessages =  Array.prototype.slice.call(document.querySelectorAll('.all-messages'), 0);
      let destroyMsgsInputEle =  document.getElementsByName('destroy_msgs');
      
      if ($allMessages.length > 0) {
          $allMessages.forEach( el => {
              el.checked = false;
              el.addEventListener('change', () => { 
                  let inputEle = document.getElementsByName('message');
                  if (el.checked) { 
                      inputEle.forEach( input => { 
                          input.checked = true;
                          ids.push(input.value);  
                      });
                  } else {
                      inputEle.forEach( input => { 
                          input.checked = false;  
                      });
                      ids = [];
                  } 
                  destroyMsgsInputEle[0].setAttribute('value', ids); 
              },false);
          });
      }
      
      let $inputEle = document.getElementsByName('message');
      if ($inputEle.length > 0) {
          $inputEle.forEach( el => {
              el.checked = false;
              el.addEventListener('change', () => {  
                  if ($allMessages.length > 0) {
                      $allMessages.forEach( el => {
                          el.checked = false;
                      });
                  }
                  if (el.checked && !ids.includes(el.value)) { 
                      ids.push(el.value);
                  } else {
                      let index = ids.indexOf(el.value);
                      ids.splice(index, 1); 
                  } 
                  destroyMsgsInputEle[0].setAttribute('value', ids); 
              },false);
          });
      }
  
  })();