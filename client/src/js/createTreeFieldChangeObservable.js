import Rx from 'rx';

/**
 * Create an observable for tree field's input change event. See
 * https://rxjs-dev.firebaseapp.com/api/index/Observable for more details on
 * observable.
 *
 * NOTE: This relies on React TreeDropdown and Redux store and state. There are
 * a few workaounds put int to work around the shortcomings in the store by the
 * tree field.
 *
 * The shortcomings:
 *  - No selected page Id in the Redux store
 *  - No ability to update the selected page on the field via store dispatch funciton
 *
 * @param {string} fieldName treedrop down field name
 *
 * @return {Rx.Observable}
 */
export default (fieldName) => {
  const store = window.ss.store;
  const input = document.querySelector(`input[type="hidden"][name="${fieldName}"]`);

  return Rx.Observable.create((observer) => {
    // Because hidden input doesn't trigger `change` event
    // we need to watch for attribute changes
    const mutationObserver = new MutationObserver(() => {
      // Get current redux state
      const state = store.getState();

      // Get pages that have been selected so far. However, redux state doesn't
      // tell which of these is/are actually selected
      const selectedValues = state
        .treeDropdownField
        .fields[`Form_EditForm_${fieldName}`]
        .selectedValues;

      // Retrieve the selected page id from the treedropdown field's
      // hidden input
      const selectedPageId = Number(input.value);

      const selectedPage = selectedValues.find(value => value.id === selectedPageId);
      if (selectedPage) {
        observer.next(selectedPage);
      }
    });

    mutationObserver.observe(
      input,
      { attributes: true },
    );
  });
};
