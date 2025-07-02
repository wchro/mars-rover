<script setup lang="ts">
import axios from 'axios';
import { ref } from 'vue';

const x = ref(5);
const y = ref(8);
const direction = ref('N');
const commands = ref('');
const result = ref(null);

const sendCommands = async () => {
    try {
        const response = await axios.post('/api/rover/move', {
            x: x.value,
            y: y.value,
            direction: direction.value,
            commands: commands.value,
        });
        result.value = response.data;
    } catch (error) {
        console.error(error);
    }
};
</script>

<template>
    <div class="mx-auto max-w-xl p-6">
        <h1 class="mb-4 text-2xl font-bold">🚀 Mars Mission</h1>

        <div class="mb-2">
            <label>X: </label>
            <input v-model="x" type="number" class="border p-1" />
        </div>

        <div class="mb-2">
            <label>Y: </label>
            <input v-model="y" type="number" class="border p-1" />
        </div>

        <div class="mb-2">
            <label>Direction: </label>
            <select v-model="direction" class="border p-1">
                <option>N</option>
                <option>S</option>
                <option>E</option>
                <option>W</option>
            </select>
        </div>

        <div class="mb-2">
            <label>Commands: </label>
            <input v-model="commands" type="text" class="border p-1" placeholder="FFRFFL" />
        </div>

        <button @click="sendCommands" class="cursor-pointer rounded bg-blue-700 px-6 py-2 text-white">Send</button>

        <div v-if="result" class="mt-4 rounded border p-4">
            <p><strong>Final Position:</strong> ({{ result.x }}, {{ result.y }})</p>
            <p><strong>Direction:</strong> {{ result.direction }}</p>
            <p><strong>Status:</strong> {{ result.message }}</p>
            <p v-if="result.obstacle" class="text-red-500">⚠️ Obstacle Detected!</p>
        </div>
    </div>
</template>

<style scoped>
input {
    width: 60px;
}
</style>
