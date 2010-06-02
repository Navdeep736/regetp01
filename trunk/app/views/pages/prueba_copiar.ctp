<style type="text/css">
        body { font-family:arial,sans-serif; font-size:9pt; }

        .my_clip_button { width:150px; text-align:center; border:1px solid black; background-color:#ccc; margin:10px; padding:10px; cursor:default; font-size:9pt; }
        .my_clip_button.hover { background-color:#eee; }
        .my_clip_button.active { background-color:#aaa; }
</style>
<?php
    echo $javascript->link('zeroclipboard/ZeroClipboard.js');
?>
<script language="JavaScript">
        var clip = null;

        function init() {
            
            clip = new ZeroClipboard.Client();
            clip.setHandCursor( true );

            clip.addEventListener('load', function (client) {
                    debugstr("Flash movie loaded and ready.");
            });

            clip.addEventListener('mouseOver', function (client) {
                    // update the text on mouse over
                    clip.setText( $('fe_text').value );
            });

            clip.addEventListener('complete', function (client, text) {
                    debugstr("Copied text to clipboard: " + text );
            });

            clip.glue( 'd_clip_button', 'd_clip_container' );
        }

        function debugstr(msg) {
                var p = document.createElement('p');
                p.innerHTML = msg;
                $('d_debug').appendChild(p);
        }

        Event.observe(window,"load", init);
</script>

<h1>Zero Clipboard Test</h1>
<p><script>document.write("Your browser: " + navigator.userAgent);</script></p>
<table width="100%">
        <tr>
                <td width="50%" valign="top">
                        <!-- Upload Form -->
                        <table>
                                <tr>
                                        <td align="right"><b>Text:</b></td>
                                        <td align="left"><textarea id="fe_text" cols=50 rows=5 onChange="clip.setText(this.value)">Copy me!</textarea></td>
                                </tr>
                        </table>
                        <br/>
                        <div id="d_clip_container" style="position:relative">
                                <div id="d_clip_button" class="my_clip_button"><b>Copy To Clipboard...</b></div>
                        </div>
                </td>
                <td width="50%" valign="top">
                        <!-- Debug Console -->
                        <div id="d_debug" style="border:1px solid #aaa; padding: 10px; font-size:9pt;">
                                <h3>Debug Console:</h3>
                        </div>
                </td>
        </tr>
</table>

<br/><br/>
You can paste text here if you want, to make sure it worked:<br/>
<textarea id="testarea" cols=50 rows=10></textarea><br/>
<input type=button value="Clear Test Area" onClick="$('testarea').value = '';"/>
