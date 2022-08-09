// constant elements: your main scrolling element; html element
const scrollEl = document.documentElement
const root = document.documentElement
const rollflower = document.querySelector('.rollflower');

var scrollPos, rollPos;

// update css property on scroll
function animation() {
  // check the scroll position has changed
  if (scrollPos !== scrollEl.scrollTop) {
	  rollflower.classList.add('rollfloweranim');

    // reset the seen scroll position
    scrollPos = scrollEl.scrollTop
    // update css property --scrollPos with scroll position in pixels
    root.style.setProperty('--scrollPos', scrollPos + 'px')
    root.style.setProperty('--rollPos', rollPos + 'deg')
    root.style.setProperty('--radPos', scrollPos/100 + 'rad')
	
  }

  // call animation again on next animation frame
  window.requestAnimationFrame(animation)
}

// start animation on next animation frame
window.requestAnimationFrame(animation)
