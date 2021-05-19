/** @module tweetProgress */

export const tweetProgress = 
{    
    initialise: function(container) {
        if(container){
            container.addEventListener('input', this.updateTweetProgress);
        }
    },
    updateTweetProgress: function(event) {
        // event is delegated to the container, so check event target
        if(!event.target.matches('.js-tweetComposeBody')){
            return;
        }

        const progress = this.querySelector('.js-tweetComposeProgress');
        const ring = progress.querySelector('.js-ring');
        const ringBG = progress.querySelector('.js-ringBG');
    
        // get character count
        const chars = event.target.value.trim().length ? event.target.value.length : 0;
        const charsRatio = chars/280;
            
        // show counter?
        if(chars > 0){ 
            progress.classList.remove('hidden');
        }
        else{
            progress.classList.add('hidden');
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
        const warning = this.querySelector('.js-tweetComposeWarning');
        if(chars < 260){
            // hide counter warning text 
            warning.textContent = "";
            
            // ring size normal
            progress.classList.remove('w-8', 'h-8');
            progress.classList.add('w-5', 'h-5');
            
            // ring viewbox normal
            progress.setAttribute('viewBox', '0 0 20 20')
    
            // circle radius normal
            ring.setAttribute('r', '9');
            ringBG.setAttribute('r', '9');
        }
        else if(chars >= 260){
            // show counter warning text 
            warning.textContent = remaining;
            
            // increase ring size:
            progress.classList.remove('w-5', 'h-5');
            progress.classList.add('w-8', 'h-8');
            
            // increase ring viewbox
            progress.setAttribute('viewBox', '0 0 30 30')
            
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
        ring.setAttribute('stroke-dasharray', circum);
        ring.setAttribute('stroke-dashoffset', Math.max(offset, 0));
            
        // enable the submit button?
        const submit = this.querySelector('.js-tweetPublishSubmit');
        if(chars > 0 && chars <= 280){
            submit.disabled = false;
            submit.classList.remove('bg-opacity-40', 'cursor-default');
            submit.classList.add('hover:bg-twdarkblue', 'shadow');
        }
        else{
            submit.disabled = true;
            submit.classList.add('bg-opacity-40', 'cursor-default');
            submit.classList.remove('hover:bg-twdarkblue', 'shadow');
        }
    }
}