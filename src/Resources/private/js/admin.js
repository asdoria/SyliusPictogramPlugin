import './sylius-move-pictograms';
import './sylius-move-pictogram-groups';

document.addEventListener('DOMContentLoaded', () => {
  $('.asdoria-update-pictograms').movePictograms($('.asdoria-pictogram-position'));
  $('.asdoria-update-pictogram-groups').movePictogramGroups($('.asdoria-pictogram-group-position'));
});
