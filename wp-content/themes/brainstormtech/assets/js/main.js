jQuery(document).ready(function($){

    var canvaslight = $("#demoLight")[0],
        ctxl = canvaslight.getContext("2d"),
        canvasdark = $("#demoDark")[0],
        ctxd = canvasdark.getContext("2d"),
        imglight = new Image(),
        radius = 72,
        lightImageSrc = "/wp-content/themes/brainstormtech/images/hero/hero-light-1.jpg",
        imgdark = new Image(),
        darkImageSrc = "/wp-content/themes/brainstormtech/images/hero/hero-dark-1.jpg";
        resizeCanvasToDisplaySize(ctxd.canvas);
        imgdark.src = darkImageSrc;

        resizeCanvasToDisplaySize(ctxl.canvas);
        imglight.src = lightImageSrc;

        loadCanvasLight();

        loadCanvasDark();

    $('.light-dark-mood input').on('click', function (){
        if( $('.light-dark-mood input:checked').length > 0 ){
            $('.light-mood').hide();
            $('.dark-mood').show();
            $('body').addClass('dark');

        } else {
            $('.light-mood').show();
            $('.dark-mood').hide();
            // $('.light-mood').fadeIn().promise().done(function() {
            //     $('.dark-mood').fadeOut();
            // });
            $('body').removeClass('dark');
        }
    })

    function loadCanvasLight() {
        $(imglight).on("load", function() {
            $("#header, #demoLight, .bottom-details, .to-bottom-scroll").bind('mousedown', function(e) {
                erase(getXYLi(e),ctxl);
                erase(getXYDa(e),ctxd);

                $("#header, #demoLight, .bottom-details, .to-bottom-scroll").bind('mousemove', function(e) {
                    erase(getXYLi(e),ctxl);
                    erase(getXYDa(e),ctxd);

                });

                $("#header, #demoLight, .bottom-details, .to-bottom-scroll").bind('mouseup',function(){
                    $("#header, #demoLight, .bottom-details, .to-bottom-scroll").unbind('mousemove')
                });
            });

            ctxl.drawImage(imglight,0,0);
            ctxl.globalCompositeOperation = "destination-out";

        });
    }

    function loadCanvasDark() {
        $(imgdark).on("load", function() {
            $("#header, #demoDark, .bottom-details, .to-bottom-scroll").bind('mousedown', function(e) {
                erase(getXYDa(e),ctxd);
                erase(getXYLi(e),ctxl);
                $("#header, #demoDark, .bottom-details, .to-bottom-scroll").bind('mousemove', function(e) {
                    erase(getXYDa(e),ctxd);
                    erase(getXYLi(e),ctxl);
                });

                $("#header, #demoDark, .bottom-details, .to-bottom-scroll").bind('mouseup',function(){
                    $("#header, #demoDark, .bottom-details, .to-bottom-scroll").unbind('mousemove')
                });
            });

            ctxd.drawImage(imgdark,0,0);
            ctxd.globalCompositeOperation = "destination-out";
        });
    }

    function getXYLi(e) {
        var r = $("#demoLight")[0].getBoundingClientRect();
        return { x: e.clientX - r.left, y: e.clientY - r.top };
    }

    function getXYDa(e) {
        var r = $("#demoDark")[0].getBoundingClientRect();
        return { x: e.clientX - r.left, y: e.clientY - r.top };
    }

    function erase(pos, ctx) {
        ctx.beginPath();
        ctx.arc(pos.x, pos.y, radius, 0, 2 * Math.PI);
        ctx.closePath();
        ctx.fill();
    }

    function resizeCanvasToDisplaySize(canvas) {

        const width = canvas.clientWidth;
        const height = canvas.clientHeight;

        if (canvas.width !== width || canvas.height !== height) {
            canvas.width = width;
            canvas.height = height;
            return true;
        }

        return false;
    }

    $("canvas").outerHeight($(window).height()-$("canvas").offset().top- Math.abs($("canvas").outerHeight(true) - $("canvas").outerHeight()));
    $(window).on("resize", function(e){
        getXYLi(e);
        getXYDa(e);
        $("canvas").outerHeight($(window).height()-$("canvas").offset().top- Math.abs($("canvas").outerHeight(true) - $("canvas").outerHeight()));
    });

})


function GetFileName(elem) {
    let fi = jQuery(elem);
    fname = fi[0].files[0].name;
    return fname;
}

jQuery('#cvFile').on('change', function () {
    let fname = GetFileName('#cvFile');
    jQuery('.file-title').text(fname);
})

// Custom select styles
var x, i, j, l, ll, selElmnt, a, b, c;

x = document.getElementsByClassName("custom-select");

if( x.length ) {
    l = x.length;
    for (i = 0; i <= l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;

        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {

            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function (e) {

                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function (e) {
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }
}

function closeAllSelect(elmnt) {
    /* A function that will close all select boxes in the document,
    except the current select box: */
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}
document.addEventListener("click", closeAllSelect);
