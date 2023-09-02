# zxslideshow
<h3><strong>Installing</strong></h3>
<p><strong>ZX Slideshow v3 is designed to work with Zen Cart 1.5.8+ (latest version at the time of release). It can be used with older versions after modifying the admin language files.</strong></p>

<p>Before you proceed, make a backup of your database. Installation is done at your own risk.</p>

<p>Unzip the files from &quot;files&quot; directory to your computer. Connect to your server via FTP. Check your admin directory name and rename the one in this package accordingly. Next, check your template directory. You can do that by going into your Zen Cart admin section and go to Tools-&gt;Template Selection and check what it says under Template Directory. Of course, you're interested in the one you're currently using. Now, browse the files you just unzipped and go to includes/templates directory. Rename &quot;YOUR_TEMPLATE&quot; to the actual template name. Now, upload your files using your FTP client (I recommend using Filezilla) to the <strong>store root</strong>. Be careful, the store root directory on the server is where your store is installed, not necessarily domain root.</p>

<p>There are three files that might get overwritten:
<ul>
<li>includes/templates/YOUR_TEMPLATE/css/index_home.css</li>
<li>includes/templates/YOUR_TEMPLATE/templates/tpl_index_default.php</li>
<li>includes/templates/YOUR_TEMPLATE/templates/tpl_index_categories.php</li>
</ul>
</

<p>In case you have made any changes to those files, make sure you merge it carefully. Otherwise, you can simply overwrite.</p>
<p>After you have finished uploading the files, go to your Zen Cart admin section and the plugin will install automatically. </p>
        
<hr>
        
<h3><strong>Configuration</strong></h3>
<p>To configure the module, go to Admin->Configuration->ZX Slideshow<br />
The module is disabled by default, you should enable it if you want to use it.<br>
All options are self-explanatory. For more information about each option, you can simply click on it.</p>

<hr>
       
<h3><strong>Adding Slides</strong></h3>
<p>Go to Admin-&gt;Tools-&gt;ZX Slideshow and click New Slide.</p>
<p>Enter Slide title - this is only used in admin and is the only required field.<br>
<strong>Lead In Text</strong> - first line of text on top.<br>
<strong>Top Title</strong> - second line of text wrapped with h2 tags. Normally your punch line for the slide.<br>
<strong>Subtitle</strong> - line that follows and describes the Top Title.<br>
<strong>Text</strong> - allows you to add a paragraph with more detailed information for the slide. Keep in mind it's just a slide and you don't want to add too much information to it.<br>
<strong>Button Text</strong> - text that shows on the button. Make sure you enter the Slide URL if you have a button!<br>
<strong>Slide Group</strong> - set to 'home' if you want to show the slide on your homepage.<br>
<strong>Image Alt Text</strong> - Add image alternative text for screen readers.
</p>
<p>If you leave any of the above blank, it simply won't be used and won't be shown on the slide.</p>
<p>The Lead In, Top Title, Subtitle, Text and Button are all animated using animate.css. You can define the effect for each element individually. You can also define the animation speed (duration), delay, position, font size and color, and it's vertical position.</p>
<p>Default values are explained in the admin so you can always see it while adding or editing a slide.</p>
<p>Image - browse your computer and upload an image.<br>
I recommend you resize your images to the same dimensions before uploading. This is not necessary since the module is responsive, but it looks better if it doesn't change dimensions with each image loading.<br>
<strong>The slider is set to use the height of your images.</strong> The full height of the image will be displayed and then positioned in the center of the container. If the width is larger than the container, it will simply appear cropped.
</p>

<hr>

<h3><strong>Additional information</strong></h3>
       
<p>If you want to change the look of your slider, you can edit the includes/templates/YOUR_TEMPLATE/css/index_home.css file - that's just about everything you'll need to edit.
<p>If you want to display the slider in the header instead of center area: <br>
<strong>Step 1</strong>: open your includes/templates/YOUR_TEMPLATE/templates/tpl_index_default.php and REMOVE all code for ZX Slideshow.<br>
<strong>Step 2</strong>: edit your includes/templates/YOUR_TEMPLATE/common/tpl_header.php and find the position where the slider should be located. This is usually at the end of the file.<br>
<strong>Step 3</strong>: add the following code:

<pre>
&lt;!-- begin edit for ZX Slideshow --&gt;
&lt;?php if($this_is_home_page && ZX_SLIDESHOW_STATUS == 'true') { ?&gt;
	&lt;?php require($template-&gt;get_template_dir('zx_slideshow.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/zx_slideshow.php'); ?&gt;
&lt;?php } ?&gt;
&lt;!-- end edit for ZX Slideshow --&gt;</pre>

<hr>

<h3><strong>Common Issues</strong></h3>

<p>Please take extra care when <strong>selecting font color</strong> for any of the text to remain compliant with <strong>Accessibility Policies</strong>. Text displayed over an image may become hard or impossible to read because of the image colors. Make sure you check your slider's accessibility after publishing a slide and make any changes required.</p>
<p>Any issues or bugs you notice, please report it in the official <a href="https://www.zen-cart.com/showthread.php?195957-ZX-Slideshow-support-thread" target="_blank">Forum</a> or on <a href="https://github.com/zenexpert/zxslideshow/issues" target="_blank">GitHub</a></p>
<p>Ideas for improvement are also most welcome!</p>

<hr>
     	
<h3><strong>Sources and Credits</strong></h3>
        
<p>External libraries used in this plugin:
<ul>
<li><a href="https://swiperjs.com/" target="_blank">Swiper</a></li>
</ul>
</p>

<p><em>If you find this module useful, <strong><a href="https://zenexpert.com/donations" target="_blank">please consider donating</a></strong> via PayPal to ensure this module is supported and improved ($5 - $10 recommended).</em></p>

<hr>

<h3><strong>Support</strong></h3>

<p>Please note that I don't provide support for this module via email for free. Any private support means there's no benefit for the community but only for the person asking the question(s). If you want free support, please post a question in the official thread and wait for the answer. Make sure you include a URL to your site!</p>
<p>AGAIN, make sure you include a LINK to your site when asking a question - all problems are usually very simple, but I can't go guessing what happened in YOUR case.</p>
<p>Most of the questions have already been answered in the official thread - try reading or searching for the answer before posting your question. Thank you.</p>

<p>If you want private support or installation help, you're welcome to contact me via email. I charge symbolic... :)</p>
<p><strong>Stay up-to-date</strong>: you can always find the most recent version <a href="http://www.zenexpert.com/zx-slideshow.php" target="_blank">here</a>. Of course, I will do my best to have the same version available in the official Plugins section.</p>

<hr>

<h3><strong>Uninstall</strong></h3>

<p>Delete all plugin files from your server. If you made any changes to the 3 files mentioned in "Installing" section, manually remove the code for ZX Slideshow from those files.</p>
<p>Once all the files are removed, run the following SQL patch from admin->Tools->Install SQL Patches:
<pre>
SET @ZXconfig=0;
SELECT @ZXconfig:=configuration_group_id
FROM configuration_group
WHERE configuration_group_title= 'ZX Slideshow'
LIMIT 1;
DELETE FROM configuration WHERE configuration_group_id = @ZXconfig;
DELETE FROM configuration_group WHERE configuration_group_id = @ZXconfig;

DELETE FROM admin_pages WHERE page_key = 'configZXSlideshow';
DELETE FROM admin_pages WHERE page_key = 'toolsZXSlideshow';
DROP TABLE zxslideshow;</pre>
</p>
