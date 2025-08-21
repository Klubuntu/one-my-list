APP_VERSION = '0.6'
$prefix = "[DEBUG]"

//var url_notes="https://onemylist.klbu.eu/?note=note1&title=Warning Note&icon=warning&color=BackgroundNote"
var url_notes="https://myonelist.klbu.eu/{note_id}"

var colorn = 1
var noteid = 1

var explist = new Array();

function userthm() {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        thmchange(1);
    } else {
        thmchange(0);
    }
}

// Listen for system theme changes
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', userthm);

// Run once on load
window.onload = userthm;

function thmchange(mode) {
    const $light = $('#light');
    const $night = $('#night');
    const $body = $('body');
    const $header = $('header');
    const $icons = $(".note .label div i, .note .label .title input, header .actions .box");

    const isDark = mode === 1 || $light.is(":visible") === true;

    console.warn("Theme Changed to", isDark ? "dark" : "light");

    if (isDark) {
        $light.hide();
        $night.fadeIn(600);
        $body.add($header).add($icons).addClass("dark");
    } else {
        $night.hide();
        $light.fadeIn(600);
        $body.add($header).add($icons).removeClass("dark");
    }
}


//https://stackoverflow.com/questions/8104242/spread-html-in-multiple-lines-javascript
function buildnote(){
    Note = '<div class="note BackgroundNote" id="note' + noteid + '"> \
    <div class="label"> \
        <div class="icon warning noselect"> \
            <i class="fa-solid fa-triangle-exclamation"></i> \
        </div> \
        <div class="title"> \
            <input type="text" value="Warning Note !!!" placeholder="" autocomplete="off"> \
        </div> \
        <div class="change-color noselect" onclick="changecolorNote(this)"> \
            <i class="fa-solid fa-palette change-color-test"></i> \
        </div> \
    </div> \
    <div class="editor"> \
        <div id="text-editor'+ noteid + '"></div> \
    </div> \
</div>'
    $(".main").append(Note)
    build_editbox("text-editor" + noteid); // Edit note id
    $('.change-color').click(function() {
        gencolor();
        id = $(this)[0].parentElement.parentElement.id
        id2 = "#" + id
        classname = $(id2)[0].className.split(" ")[1]
        $(id2).removeClass(classname);
        $(id2).toggleClass(color);
    });
    noteid += 1
}

function gencolor(){
    if(colorn == 1){
        color = 'BackgroundWhite'
    }
    else if(colorn == 2){
        color = 'BackgroundBlack2'
    }
    else if(colorn == 3){
        color = 'BackgroundGrey'
    }
    else if(colorn == 4){
        color = 'BackgroundYellow'
    }
    else if(colorn == 5){
        color = 'BackgroundOrange'
    }
    else if(colorn == 6){
        color = 'BackgroundBrown'
    }
    else if(colorn == 7){
        color = 'BackgroundRed'
    }
    else if(colorn == 8){
        color = 'BackgroundPink'
    }
    else if(colorn == 9){
        color = 'BackgroundPurple'
    }
    else if(colorn == 10){
        color = 'BackgroundBlue'
    }
    else if(colorn == 11){
        color = 'BackgroundGreen'
    }
    else if(colorn == 12){
        color = 'BackgroundLuckyOrange'
    }
    else if(colorn == 13){
        color = 'BackgroundOrangePeel'
    }
    else if(colorn == 14){
        color = 'BackgroundPumpkin'
    }
    else if(colorn == 15){
        color = 'BackgroundTangerine'
    }
    else if(colorn == 16){
        color = 'BackgroundIndianSaffron'
    }
    else if(colorn == 17){
        color = 'BackgroundTealBlue'
    }
    else if(colorn == 18){
        color = 'BackgroundPastelTeal'
    }
    else if(colorn == 19){
        color = 'BackgroundSpringTeal'
    }
    else if(colorn == 20){
        color = 'BackgroundRadioactive'
    }
    else if(colorn == 21){
        color = 'BackgroundSunglow'
    }
    else if(colorn == 22){
        color = 'BackgroundCyan'
        colorn = 1
    }
    colorn += 1
}

function changecolorNote(elem){
    gencolor();
    id = $(elem)[0].parentElement.parentElement.id
    id2 = "#" + id
    classname = $(id2)[0].className.split(" ")[1]
    $(id2).removeClass(classname);
    $(id2).toggleClass(color);
}

function url_soon(){
    message = "URL on Soon: " + url_notes;
    alert(message);
}

function exportnote(id=1){
    tmparr = new Array();
    n1 = "#note" + id
    n2 = "#text-editor" + id
    notebg = $(n1)[0].className.split(" ")[1];
    notetitle = $(n1).children().children()[1].children[0].value;
    d = document.querySelector(n2).nextElementSibling;
    notemsg = $(d).children()[2].children[0].children[0].getInnerHTML();
    tmparr.push(notebg, notetitle, notemsg);
    explist.push(tmparr);
}


function savenote(id=1){
    n1 = "#note" + id
    n2 = "#text-editor" + id
    notebg = $(n1)[0].className.split(" ")[1];
    notetitle = $(n1).children().children()[1].children[0].value;
    d = document.querySelector(n2).nextElementSibling;
    notemsg = $(d).children()[2].children[0].children[0].getInnerHTML();
    $.post("api/note/save.php", 
        { note_bg: notebg, note_title: notetitle , note_msg: notemsg},
        function (data) {
            console.log(data);
        },
    );
}


// Save & Read Notes from JSON

function load_note(){
    $.getJSON("api/note/get/Q2LcY.json",
    function (data) {
        for (n = 0; n < data.length; n++){
            x = data[n]
            for (r = 0; r < x.length; r++){
                console.warn(x[n])
            }
        }
    }
);
}

function savenotes(){
    explist = []
    save_repeat = noteid - 1
    for (n = 0; n < save_repeat; n++){
        n2 = n + 1
        console.log(n2)
        exportnote(n2)
    }
    $.post("api/note/dump.php", 
        {var: explist},
         function (data) {
            console.log(data);
        },
    ); 
}

// On progress || Fix save noted 
// Add Page Load saved JSON

$(function () {
    //$(".ck-list-styles-dropdown").children().children()[1].remove()
    $("figure.image").click(function() { 
        for (n = 0; n <= 7; n++){
            $(".ck-balloon-rotator__content").children().children().children()[0].remove()
        }
    });
    setTimeout(function(){
        $(".app-loading").remove();
        $(".app").fadeIn();
        clearInterval(tmpLoading)
    }, 2000)

        
    });


console.log($prefix, "App Version:", APP_VERSION)