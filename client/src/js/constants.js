import deepFreeze from 'deep-freeze';

export default deepFreeze({
  SHAPE: {
    CIRCLE: 'circle',
    RECT: 'rectangle',
  },

  RESIZE_DIR: {
    NW: 'north-west',
    SE: 'south-east',
  },
});
