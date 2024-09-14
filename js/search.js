jQuery(document).ready(function ($) {
  // Handle form submission for adding or updating a niche
  $('#niche-form').on('submit', function (e) {
    e.preventDefault();
    let nicheData = {
      action: 'add_or_update_niche',
      niche_id: $('#niche-id').val(),
      niche_name: $('#niche-name').val(),
      niche_features: $('#niche-features').val(),
    };

    $.post(ajaxurl, nicheData, function (response) {
      if (response.success) {
        location.reload(); // Reload the page after successful submission
      }
    });
  });

  // Handle delete action
  $('.delete-niche').on('click', function () {
    if (confirm('Are you sure you want to delete this niche?')) {
      let nicheId = $(this).data('id');

      $.post(
        ajaxurl,
        {
          action: 'delete_niche',
          niche_id: nicheId,
        },
        function (response) {
          if (response.success) {
            location.reload(); // Reload the page after deletion
          }
        }
      );
    }
  });

  // Handle edit action
  $('.edit-niche').on('click', function () {
    let nicheId = $(this).data('id');
    let nicheRow = $(this).closest('tr');

    $('#niche-id').val(nicheId);
    $('#niche-name').val(nicheRow.find('td:eq(0)').text());
    $('#niche-features').val(
      nicheRow.find('td:eq(1)').html().replace(/<br>/g, '\n')
    );

    $('html, body').animate(
      {
        scrollTop: $('#niche-form').offset().top,
      },
      500
    );
  });

  // Search functionality
  $('#search-bar').on('keyup', function () {
    var input = this.value.toLowerCase();
    var rows = Array.from(document.querySelectorAll('#table-body tr')); // Get all rows in an array
    var exactNicheMatches = []; // Store rows that exactly match the niche name
    var partialNicheMatches = []; // Store rows that partially match the niche name
    var featureMatches = []; // Store rows that match in the features

    // Reset all rows to their default order
    rows.forEach(function (row) {
      row.style.display = ''; // Show all rows
    });

    rows.forEach(function (row) {
      var nicheName = row
        .querySelector('td:nth-child(1)')
        .innerText.toLowerCase(); // Niche name (first column)
      var features = row
        .querySelector('td:nth-child(2)')
        .innerText.toLowerCase(); // Features (second column)

      if (nicheName === input) {
        // Exact match in niche name
        exactNicheMatches.push(row);
      } else if (nicheName.startsWith(input)) {
        // Partial match at the start of niche name
        partialNicheMatches.push(row);
      } else if (nicheName.includes(input)) {
        // Match anywhere in niche name
        partialNicheMatches.push(row);
      } else if (features.includes(input)) {
        // Match found in the features
        featureMatches.push(row);
      }
    });

    // Move matching rows to the top of the table in priority order
    var tbody = document.getElementById('table-body');

    // First, insert the exact matches from the niche name
    exactNicheMatches.forEach(function (row) {
      tbody.insertBefore(row, tbody.firstChild);
    });

    // Then, insert the partial matches that start with the input from the niche name
    partialNicheMatches.forEach(function (row) {
      tbody.insertBefore(row, tbody.firstChild);
    });

    // Finally, insert the matches from the features column
    featureMatches.forEach(function (row) {
      tbody.insertBefore(row, tbody.firstChild);
    });
  });
});
