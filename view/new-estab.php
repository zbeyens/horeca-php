<tr>
    <td colspan="2" class="note">Les champs marqués par <span style="color:#FF0000">*</span> sont obligatoires.
    </td>
</tr>
<tr>
    <td align="right" width="32%"><span style="color:#FF0000">*</span>Nom</td>
    <td width="68%"><input name="name" maxlength="30" required class="input" type="text" 
    value="<?php if (isset($festab)) { echo $festab['Name']; }?>"></td>
</tr>
<tr>
   <td align="right"><span style="color:#FF0000">*</span>Rue</td>
   <td><input name="adstreet" size="20" maxlength="30" required class="input" type="text"
   value="<?php if (isset($festab)) { echo $festab['AdStreet']; }?>"></td>
</tr>
<tr>
   <td align="right"><span style="color:#FF0000">*</span>N°</td>
   <td><input name="adnum" size="20" maxlength="30" required class="input" type="text"
   value="<?php if (isset($festab)) { echo $festab['AdNum']; }?>" pattern="[0-9]{1,}"></td>
</tr>
<tr>
   <td align="right"><span style="color:#FF0000">*</span>Code postal</td>
   <td><input name="adzip" size="20" maxlength="30" required class="input" type="text"
   value="<?php if (isset($festab)) { echo $festab['AdZip']; }?>" pattern="[0-9]{3,10}"></td>
</tr>
<tr>
   <td align="right"><span style="color:#FF0000">*</span>Ville</td>
   <td><input name="adcity" size="20" maxlength="30" required class="input" type="text"
   value="<?php if (isset($festab)) { echo $festab['AdCity']; }?>"></td>
</tr>
<tr>
   <td align="right"><span style="color:#FF0000">*</span>Longitude</td>
   <td><input name="adlongitude" size="20" maxlength="30" required class="input" type="text"
   value="<?php if (isset($festab)) { echo $festab['AdLongitude']; }?>"></td>
</tr>
<tr>
   <td align="right"><span style="color:#FF0000">*</span>Latitude</td>
   <td><input name="adlatitude" size="20" maxlength="30" required class="input" type="text"
   value="<?php if (isset($festab)) { echo $festab['AdLatitude']; }?>"></td>
</tr>
<tr>
   <td align="right"><span style="color:#FF0000">*</span><i class="fa fa-phone"></i></td>
   <td><input name="tel" size="20" maxlength="30" required class="input" type="text"
   value="<?php if (isset($festab)) { echo $festab['Tel']; }?>"></td>
</tr>
<tr>
   <td align="right"><i class="fa fa-external-link"></i> Site</td>
   <td><input name="sitelink" size="20" maxlength="30" class="input" type="text"
   value="<?php if (isset($festab)) { echo $festab['SiteLink']; }?>" ></td> <!--pattern="https?://.+"-->
</tr>