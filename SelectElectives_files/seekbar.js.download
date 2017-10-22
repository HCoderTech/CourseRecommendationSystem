window.addEventListener('load', function () {
	var pointer_down = false;
    var seekbarvalues = document.getElementsByClassName('seekbarvalues');
    var seekbar = document.getElementsByClassName('seekbar');
	 
    for (var i = 0; i < seekbar.length; i++) {

        /*
         * Initial Seekbar
         */
        seekbar[i].innerHTML = '<div class="seekbar_btn"></div><div class="seekbar_bg"></div>';
        var seekbar_btn = seekbar[i].getElementsByClassName('seekbar_btn')[0];
        var seekbar_bg = seekbar[i].getElementsByClassName('seekbar_bg')[0];

        if (seekbar[i].hasAttribute('data-seekbar-value')) {
            var posi = seekbar[i].getAttribute('data-seekbar-value');
			seekbarvalues[i].innerHTML=posi;
            seekbar_setposi(seekbar_btn, seekbar_bg, posi,i);
        } else {
            seekbar[i].setAttribute('data-seekbar-value', '0');
        }

        /*
         * CLick Function
         */
        seekbar[i].addEventListener('click', function (e) {
            var posi = seekbar_getposi(this, e);
            seekbar_setposi(ch_elm(this, 'seekbar_btn'), ch_elm(this, 'seekbar_bg'), posi,i);
        }, false);

        /*
         * Move or Drag Function
         */
        seekbar[i].addEventListener('mousemove', function (e) {
            if (pointer_down === true) {
                var posi = seekbar_getposi(this, e);
                if (posi < 0 || posi > 100) {
                    remv_evt();
                } else {
                    seekbar_setposi(ch_elm(this, 'seekbar_btn'), ch_elm(this, 'seekbar_bg'), posi,i);
                }
            } else {
                remv_evt();
            }
        }, false);
    }

    window.addEventListener('mousedown', function (e) {
        pointer_down = true;
    }, false);

    window.addEventListener('mouseup', function () {
        pointer_down = false;
        remv_evt();
    }, false);

}, false);

function ch_elm(parent, child) {
    return parent.getElementsByClassName(child)[0];
}

/*
 * Get Position 
 */
function seekbar_getposi(elem, e) {
    if (elem !== undefined && e !== undefined) {
        var prefix = parseInt(elem.offsetLeft);
        var point_e = (((parseInt(e.pageX) - prefix) / parseInt(elem.clientWidth)) * 100)-18;

        if (point_e < 0) {
            point_e = 0;

        } else if (point_e > 100) {
            point_e = 100;
        }
        console.log('get: ' + point_e);
        return Math.round(point_e);
    }
}

/*
 * Set Position 
 */
function seekbar_setposi(btn, bg, posi,i) {
    if (btn !== undefined) {
        btn.style.left = posi + "%";
        bg.style.width = posi + "%";
        btn.parentElement.setAttribute('data-seekbar-value', posi);
        console.log('set: ' + posi);
		
		
    }
}

/*
 * Remove Events
 */
function remv_evt() {
    window.removeEventListener('mousedown', seekbar_getposi, true);
    window.removeEventListener('mousemove', seekbar_getposi, true);
    window.removeEventListener('mousedown', seekbar_setposi, true);
    window.removeEventListener('mousemove', seekbar_setposi, true);
}