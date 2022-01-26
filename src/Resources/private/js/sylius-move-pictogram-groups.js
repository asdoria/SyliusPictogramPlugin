import 'semantic-ui-css/components/api';
import $ from 'jquery';

$.fn.extend({
  movePictogramGroups(positionInput) {
    const pictogramGroupRows = [];
    const element = this;

    element.api({
      method: 'PUT',
      beforeSend(settings) {
        /* eslint-disable-next-line no-param-reassign */
        settings.data = {
          pictogramGroups: pictogramGroupRows,
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
      const pictogramGroupId = input.data('id');
      const row = pictogramGroupRows.find(({ id }) => id === pictogramGroupId);

      if (!row) {
        pictogramGroupRows.push({
          id: pictogramGroupId,
          position: input.val(),
        });
      } else {
        row.position = input.val();
      }
    });
  },
});
