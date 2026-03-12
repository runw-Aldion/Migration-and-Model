<h1>Create Task</h1>

<form action="/tasks" method="POST">
    @csrf

    <label>Title:</label><br>
    <input type="text" name="title"><br><br>

    <label>Description:</label><br>
    <textarea name="description"></textarea><br><br>

    <label>
        <input type="checkbox" name="is_completed" value="1">
        Completed
    </label><br><br>

    <button type="submit">Save</button>
</form>

<a href="/tasks">Back</a>