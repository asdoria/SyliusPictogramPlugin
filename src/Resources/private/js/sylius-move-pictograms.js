import 'semantic-ui-css/components/api';
import $ from 'jquery';

$.fn.extend({
  movePictograms(positionInput) {
    const pictogramRows = [];
    const element = this;

    element.api({
      method: 'PUT',
      beforeSend(settings) {
        /* eslint-disable-next-line no-param-reassign */
        settings.data = {
          pictograms: pictogramRows,
          _csrf_token: element.data('csrf-token'),
        };

        return settings;
      },
      onSuccess() {
        window.location.reload();
      },
    });

    positionInput.on('input', (event) => {
      const input = $(event.currentTarget);
      const pictogramId = input.data('id');
      const row = pictogramRows.find(({ id }) => id === pictogramId);

      if (!row) {
        pictogramRows.push({
          id: pictogramId,
          position: input.val(),
        });
      } else {
        row.position = input.val();
      }
    });
  },
});
