import { StatusBar } from "expo-status-bar";
import React, { useState } from "react";

// https://react-native-async-storage.github.io/async-storage/docs/usage/
import AsyncStorage from '@react-native-async-storage/async-storage';

import {
    StyleSheet,
    Text,
    View,
    Image,
    TextInput,
    Button,
    TouchableOpacity,
    Alert,
} from "react-native";

export default function App() {
    const [username, onChangeText] = React.useState("");
    const [password, onChangePass] = React.useState("");
    let is_logged_in = true;
    const myfun = async () => {
        Alert.alert("Auth", `username: ${username}, Pass: ${password}`);
        storeData(username);
        // let username_local = await AsyncStorage.getItem('@user_key');
        // console.log("user: ", username_local);
        getData().then(res => console.log("Data user: ", res));
    }

    const storeData = async (value) => {
        try {
            await AsyncStorage.setItem('@user_key', value)
        } catch (e) {
            // saving error
        }
    }

    const getData = async () => {
        try {
            const value = await AsyncStorage.getItem('@user_key')
            if (value !== null) {
                // value previously stored
                return value;
            }
        } catch (e) {
            // error reading value
            return e;
        }
    }

    return (
        <View style={styles.container}>
            {/* <Image style={styles.image} source={require("./assets/log2.png")} /> */}

            {is_logged_in &&
                <>
                    <StatusBar style="auto" />
                    <View style={styles.inputView}>
                        <TextInput
                            style={styles.TextInput}
                            placeholder="Username"
                            placeholderTextColor="#003f5c"
                            onChangeText={(username) => onChangeText(username)}
                        />
                    </View>

                    <View style={styles.inputView}>
                        <TextInput
                            style={styles.TextInput}
                            placeholder="Password."
                            placeholderTextColor="#003f5c"
                            secureTextEntry={true}
                            onChangeText={(password) => onChangePass(password)}
                        />
                    </View>

                    {/* <TouchableOpacity>
                    <Text style={styles.forgot_button}>Forgot Password?</Text>
                </TouchableOpacity> */}

                    <TouchableOpacity onPress={myfun} style={styles.loginBtn}>
                        <Text style={styles.loginText}>LOGIN</Text>
                    </TouchableOpacity>
                </>
            }

            {!is_logged_in &&
                <>
                    <Text>You have successfully Logged in!</Text>
                </>
            }


        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: "#fff",
        alignItems: "center",
        justifyContent: "center",
    },

    image: {
        marginBottom: 40,
    },

    inputView: {
        backgroundColor: "#d1faff",
        borderRadius: 30,
        width: "70%",
        height: 45,
        marginBottom: 20,

        alignItems: "center",
    },

    TextInput: {
        height: 50,
        flex: 1,
        padding: 10,
        marginLeft: 20,
    },

    forgot_button: {
        height: 30,
        marginBottom: 30,
    },

    loginBtn: {
        width: "80%",
        borderRadius: 25,
        height: 50,
        alignItems: "center",
        justifyContent: "center",
        marginTop: 40,
        backgroundColor: "#29a8cf",
    },
});