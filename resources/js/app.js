require('./bootstrap');
import autosize from 'autosize';
autosize(document.querySelector('#composeTweetBody'));




const tweet = document.getElementById('composeTweetBody');

tweet.addEventListener('input', (e)=>{
    const counter = document.getElementById('composeTweetCounter');
    const ring = counter.children[1];
    const ringBG = counter.children[0];

    // get character count
    const chars = e.target.value.length;
    const charsRatio = chars/280;
        
    if(chars === 0){
        counter.classList.add('hidden');
    }
    else{
        counter.classList.remove('hidden');
    }


    // update svg ring status colour 
    if(chars < 260){
        ring.setAttribute('stroke', '#1DA1F2');
    }
    else if(chars >= 260 && chars < 280){
        ring.setAttribute('stroke', 'orange');
    }
    else if(chars >= 280){
        ring.setAttribute('stroke', 'red');
    }

    // show chars remaining warning
    const remaining = 280 - chars;
    const warning = document.getElementById('composeTweetWarning');
    if(chars < 260){
        // hide counter warning text 
        warning.innerHTML = "";
        
        // ring size normal
        counter.classList.remove('w-8', 'h-8');
        counter.classList.add('w-5', 'h-5');
        
        // ring viewbox normal
        counter.setAttribute('viewBox', '0 0 20 20')

        // circle radius normal
        ring.setAttribute('r', '9');
        ringBG.setAttribute('r', '9');
    }
    else if(chars >= 260){
        // show counter warning text 
        warning.innerHTML = remaining;
        
        // increase ring size:
        counter.classList.remove('w-5', 'h-5');
        counter.classList.add('w-8', 'h-8');
        
        // increase ring viewbox
        counter.setAttribute('viewBox', '0 0 30 30')
        
        // increase circle radius
        ring.setAttribute('r', '14');
        ringBG.setAttribute('r', '14');
    }

    // update warning text colour
    if(chars < 280){
        warning.classList.remove('text-red-600');
        warning.classList.add('text-gray-500');
    }
    else{
        warning.classList.remove('text-gray-500');
        warning.classList.add('text-red-600');
    }
    
    // calculate offset
    const circum = 2 * Math.PI * (ring.getBBox().width / 2);
    const offset = circum - (circum * charsRatio);

    // update svg ring position
    ring.setAttribute('stroke-dasharray', circum)
    ring.setAttribute('stroke-dashoffset', Math.max(offset, 0))
        
    // disable the submit button
    const submit = document.getElementById('composeTweetSubmit');
    if(chars > 0 && chars <= 280){
        submit.disabled = false;
        submit.classList.remove('bg-opacity-40', 'cursor-default')
        submit.classList.add('hover:bg-opacity-80', 'shadow')
    }
    else{
        submit.disabled = true;
        submit.classList.add('bg-opacity-40', 'cursor-default')
        submit.classList.remove('hover:bg-opacity-80', 'shadow')

    }

});


const form = document.getElementById('composeTweetForm');
form.addEventListener('submit', event => {
  // submit event detected
})