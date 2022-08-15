<form method="post"  enctype="multipart/form-data" action="/testimonials/file_upload.php">
<table>
<tr>
<td width="250">Name</td>
<td>
<input name="fname" type="text" id="fname" /><br />
</td>
</tr>
<tr>
<td width="250">Email: (will not be publicized)</td>
<td>
<input name="email" type="text" id="email" /><br />
</td>
</tr>
<tr>
<td width="250">Client Type</td>
<td id="mainselection">
<select name="type" id="type">
    <option></option>
    <option value="Residential">Residential</option>
    <option value="Business">Business</option>

</select>
</td>
</tr>
<tr>
<td width="250">Comments</td>
<td>
<textarea id="content" name="content" rows="10" cols="50" style="border-style:groove;box-shadow: 4px 4px 4px 4px #888888;"placeholder="Please describe your experience"></textarea>
</td>
</tr>
<tr>
<td width="250">Image</td>
<td>
<input name="image" type="file" id="file">
</td>
</tr>

<tr>
<td width="250"> </td>
<td>
<input name="add" type="submit" id="add" value="Add Testimonial">
</td>
</tr>
</table>
</form>