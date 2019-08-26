// var $superSelector = $('.super-selector');

// function syncOptions() {
//   var $selects = $('.super-selector select');

//   // Create empty array to store the selected values
//   var selectedValue = [];

//   // Get all selected options and filter them to get only options with value attr (to skip the default options). After that push the values to the array.
//   $selects.find(':selected').filter(function(idx, el) {
//     return $(el).attr('value');
//   }).each(function(idx, el) {
//     selectedValue.push($(el).attr('value'));
//   });
//   // Loop all the options
//   $selects.find('option').each(function(idx, option) {
//     // If the array contains the current option value otherwise we re-enable it.
//     if (selectedValue.indexOf($(option).attr('value')) > -1) {
//       // If the current option is the selected option, we skip it otherwise we disable it.
//       if ($(option).is(':checked')) {
//         return;
//       } else {
//         $(this).attr('disabled', true);
//       }
//     } else {
//       $(this).attr('disabled', false);
//     }
//   });
// }

// // Add a new item
// $superSelector.on('click', '.js-add-select', function(e) {
//   e.preventDefault();

//   // Clone the first item
//   var clone = $superSelector.find('.item:first-child').clone();

//   // Clear the values
//   clone.find('input').attr('name', '');
//   clone.find('input').val('');

//   // Append the clone
//   $superSelector.find('.items').append(clone);

//   // Sync
//   syncOptions();
// });

// // Set the selected value to to siblings input name
// $superSelector.on('change', 'select',function() {
//   $(this).siblings('input').attr('name', $(this).val());
//   syncOptions();
// });

// // Remove item
// $superSelector.on('click', '.item .js-remove-item', function() {
//   $(this).closest('.item').remove();
//   syncOptions();
// });