import React, { useEffect } from "react";
import { Alert, Button, SafeAreaView, StyleSheet, TextInput } from "react-native";
import Geolocation from 'react-native-geolocation-service';

const UselessTextInput = () => {
  const [username, onChangeText] = React.useState("");
  const [password, onChangePass] = React.useState("");

  const authenticate = () => {
    Alert.alert("Auth", `username: ${username}, Pass: ${password}`);
  }
  useEffect(() => {
    // Update the document title using the browser API
    // document.title = `You clicked ${count} times`;
  });


  return (
    <SafeAreaView style={{ marginTop: 100 }}>
      <TextInput
        style={styles.input}
        placeholder="Username"
        value={username}
        onChangeText={onChangeText}
      />
      <TextInput
        style={styles.input}
        placeholder="Password"
        value={password}
        onChangeText={onChangePass}
      />
      <Button
        onPress={authenticate}
        title="Login"
        color="#841584"
      />
    </SafeAreaView>
  );
};

const styles = StyleSheet.create({
  input: {
    height: 40,
    margin: 12,
    borderWidth: 1,
    padding: 10,
  },
});

export default UselessTextInput;