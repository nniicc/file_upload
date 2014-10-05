FileUpload
==========

A drag and drop file uploader with a paste image feature in it

Example: http://portal-devel.test.sonchek.com/fileUpload/

First of all you need to include the js/uploader.js file to your project

Now if you wish to have a button to upload a file as well you should have a form in your html like
```html
<form id="inputForm">
    <input type="file" multiple="multiple" name="files[]" id="inputFiles">
</form>
```
The multiple and name can be optional, but if you wish to change the id you will need to edit the uploader.js

Next up is the important part for a drag and drop box

```css
.dropzone{
    width: 300px;
    height: 300px;
    border: 2px dashed #ccc;
    color: #ccc;
    line-height: 300px;
    text-align: center;
}

.dropzone.dragover{
    border-color: #000;
    color: #000;
}

```

```html
<div class="dropzone" id="dropzone">Drop files here to upload</div>
```

Now for the progress bar its pretty simple if you want it to looke the same as in the example, I don't recomment changing the names then you would have to play around with uploader.js as well

```css
.progressWarper{
    display: none;
    width: 300px;
}

.meter {
    height: 20px;  /* Can be anything */
    position: relative;
    margin: 20px 0 20px 0; /* Just for demo spacing */
    background: #f3f3f3;
    -moz-border-radius: 25px;
    -webkit-border-radius: 25px;
    border-radius: 25px;
    padding: 10px;
    -webkit-box-shadow: inset 0 -1px 1px rgba(255,255,255,0.3);
    -moz-box-shadow   : inset 0 -1px 1px rgba(255,255,255,0.3);
    box-shadow        : inset 0 -1px 1px rgba(255,255,255,0.3);
}
.meter > span {
    display: block;
    height: 100%;
       -webkit-border-top-right-radius: 8px;
    -webkit-border-bottom-right-radius: 8px;
           -moz-border-radius-topright: 8px;
        -moz-border-radius-bottomright: 8px;
               border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        -webkit-border-top-left-radius: 20px;
     -webkit-border-bottom-left-radius: 20px;
            -moz-border-radius-topleft: 20px;
         -moz-border-radius-bottomleft: 20px;
                border-top-left-radius: 20px;
             border-bottom-left-radius: 20px;
    background-color: #99FF66;
    background-image: -webkit-gradient(
      linear,
      left bottom,
      left top,
      color-stop(0, rgb(43,194,83)),
      color-stop(1, rgb(84,240,84))
     );
    background-image: -moz-linear-gradient(
      center bottom,
      rgb(43,194,83) 37%,
      rgb(84,240,84) 69%
     );
    -webkit-box-shadow:
      inset 0 2px 9px  rgba(255,255,255,0.3),
      inset 0 -2px 6px rgba(0,0,0,0.4);
    -moz-box-shadow:
      inset 0 2px 9px  rgba(255,255,255,0.3),
      inset 0 -2px 6px rgba(0,0,0,0.4);
    box-shadow:
      inset 0 2px 9px  rgba(255,255,255,0.3),
      inset 0 -2px 6px rgba(0,0,0,0.4);
    position: relative;
    overflow: hidden;
}
.meter > span:after, .animate > span > span {
    content: "";
    position: absolute;
    top: 0; left: 0; bottom: 0; right: 0;
    background-image:
       -webkit-gradient(linear, 0 0, 100% 100%,
          color-stop(.25, rgba(255, 255, 255, .2)),
          color-stop(.25, transparent), color-stop(.5, transparent),
          color-stop(.5, rgba(255, 255, 255, .2)),
          color-stop(.75, rgba(255, 255, 255, .2)),
          color-stop(.75, transparent), to(transparent)
       );
    background-image:
        -moz-linear-gradient(
          -45deg,
          rgba(255, 255, 255, .2) 25%,
          transparent 25%,
          transparent 50%,
          rgba(255, 255, 255, .2) 50%,
          rgba(255, 255, 255, .2) 75%,
          transparent 75%,
          transparent
       );
    z-index: 1;
    -webkit-background-size: 50px 50px;
    -moz-background-size: 50px 50px;
    -webkit-animation: move 2s linear infinite;
       -webkit-border-top-right-radius: 8px;
    -webkit-border-bottom-right-radius: 8px;
           -moz-border-radius-topright: 8px;
        -moz-border-radius-bottomright: 8px;
               border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        -webkit-border-top-left-radius: 20px;
     -webkit-border-bottom-left-radius: 20px;
            -moz-border-radius-topleft: 20px;
         -moz-border-radius-bottomleft: 20px;
                border-top-left-radius: 20px;
             border-bottom-left-radius: 20px;
    overflow: hidden;
}

.animate > span:after {
    display: none;
}

@-webkit-keyframes move {
    0% {
       background-position: 0 0;
    }
    100% {
       background-position: 50px 50px;
    }
}
//to change the color of the progress to orange
.orange > span {
    background-color: #f1a165;
    background-image: -moz-linear-gradient(top, #f1a165, #f36d0a);
    background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f1a165),color-stop(1, #f36d0a));
    background-image: -webkit-linear-gradient(#f1a165, #f36d0a);
}
//to change the color of the progress to red
.red > span {
    background-color: #f0a3a3;
    background-image: -moz-linear-gradient(top, #f0a3a3, #f42323);
    background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f0a3a3),color-stop(1, #f42323));
    background-image: -webkit-linear-gradient(#f0a3a3, #f42323);
}
```

In the second div you can add a color if you wish to change the color of the progress bar to orange, red or any color you wish to style yourself

```html
<div class="progressWarper">
    <div class="meter animate">
        <span id="progressbar" style="width: 0%"></span>
    </div>
</div>
```

The next thing is pretty cool in some browsers you can paste images from your clipboard into the website for it to upload (Chrome, firefox, IE, safari, opera), for some of them to work you need to add this. You can change the div id but not that you have to change it in the uploader.js as well

```css
.contenteditable{
    width: 0px;
    height: 0px;
}
```

```html
<div id="rte" class="contenteditable" contenteditable="true"></div>
```

Copyright © Marko Kuhar
