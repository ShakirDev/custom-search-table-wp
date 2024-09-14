jQuery(document).ready(function ($) {
  // Handle inline editing of niche title and features
  $(document).on('click', '.edit-niche', function () {
    var postId = $(this).data('id');
    var titleField = $('.niche-title[data-id="' + postId + '"]');
    var featuresField = $('.niche-features[data-id="' + postId + '"]');

    // Check if already in edit mode (to prevent multiple inputs)
    if (!$(this).hasClass('editing')) {
      // Create editable input fields
      var currentTitle = titleField.text();
      var currentFeatures = featuresField.text();

      titleField.html(
        '<input type="text" class="niche-title-edit" value="' +
          currentTitle +
          '">'
      );
      featuresField.html(
        '<textarea class="niche-features-edit">' +
          currentFeatures +
          '</textarea>'
      );

      // Change the edit button to a save button
      $(this)
        .text('Save')
        .removeClass('edit-niche')
        .addClass('save-niche editing');
    }
  });

  // Handle saving after editing
  $(document).on('click', '.save-niche', function () {
    var postId = $(this).data('id');
    var titleField = $('.niche-title-edit');
    var featuresField = $('.niche-features-edit');

    // Get the new values
    var updatedTitle = titleField.val();
    var updatedFeatures = featuresField.val();

    // Only proceed if the user has made changes (you can add additional validation here if needed)
    if (updatedTitle !== '' && updatedFeatures !== '') {
      // Send AJAX request to save the data
      $.ajax({
        url: ajaxurl,
        method: 'POST',
        data: {
          action: 'save_niche_inline',
          post_id: postId,
          niche_title: updatedTitle,
          niche_features: updatedFeatures,
        },
        success: function (response) {
          if (response.success) {
            alert('Niche updated successfully.');
            // Replace input fields with updated text
            $('.niche-title[data-id="' + postId + '"]').text(updatedTitle);
            $('.niche-features[data-id="' + postId + '"]').text(
              updatedFeatures
            );
            // Change save button back to edit button
            $('.save-niche')
              .text('Edit')
              .removeClass('save-niche editing')
              .addClass('edit-niche');
          } else {
            alert('Failed to update niche.');
          }
        },
      });
    } else {
      alert('Please fill out both fields.');
    }
  });
});
