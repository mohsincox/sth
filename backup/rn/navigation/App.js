// import React, { Component } from 'react';
// import { Text, View } from 'react-native';

// export default class HelloWorldApp extends Component {
//   render() {
//     return (
//       <View>
//         <Text>Hello world!</Text>
//       </View>
//     );
//   }
// }


import React, { Component } from 'react';
import { WebView } from 'react-native';

export default class MyWeb extends Component {
  render() {
    return (
      <WebView
        source={{uri: 'https://github.com/facebook/react-native'}}
        style={{marginTop: 20}}
      />
    );
  }
}



//react native apps github