<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Tasks</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f6f4ff;
            --ink: #17131f;
            --ink-soft: #524c60;
            --border: #17131f;
            --purple: #7b5cff;
            --purple-dark: #5f3fe0;
            --yellow: #ffd23f;
            --coral: #ff5d5d;
            --coral-bg: #ffe3df;
            --green: #05c88a;
            --green-bg: #d7f9ec;
            --white: #ffffff;
        }

        * { box-sizing: border-box; }

        html { scroll-padding-top: env(safe-area-inset-top, 0px); }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: var(--bg);
            background-image: radial-gradient(circle, rgba(23,19,31,.06) 1.5px, transparent 1.5px);
            background-size: 22px 22px;
            color: var(--ink);
            margin: 0;
            min-height: 100vh;
            padding: env(safe-area-inset-top, 0px) 0 env(safe-area-inset-bottom, 0px);
        }

        .page {
            max-width: 640px;
            margin: 0 auto;
            padding: 2.5rem 1.25rem 4rem;
        }

        /* ---------- Header band ---------- */

        .hero {
            background: var(--purple);
            border: 3px solid var(--border);
            border-radius: 16px;
            box-shadow: 6px 6px 0 var(--border);
            padding: 1.6rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.75rem;
            flex-wrap: wrap;
        }

        h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 1.9rem;
            letter-spacing: -.01em;
            margin: 0;
            color: var(--white);
            line-height: 1.05;
        }

        .dateline {
            font-size: .82rem;
            color: #e4dcff;
            margin-top: .3rem;
            font-weight: 500;
        }

        .add-link button {
            font: inherit;
            font-family: 'Space Grotesk', sans-serif;
            font-size: .92rem;
            font-weight: 700;
            background: var(--yellow);
            border: 3px solid var(--border);
            color: var(--ink);
            padding: .65rem 1.1rem;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 3px 3px 0 var(--border);
            transition: transform .08s ease, box-shadow .08s ease;
        }

        .add-link button:hover {
            transform: translate(-2px, -2px);
            box-shadow: 5px 5px 0 var(--border);
        }

        .add-link button:active {
            transform: translate(1px, 1px);
            box-shadow: 1px 1px 0 var(--border);
        }

        .flash {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            font-size: .85rem;
            color: var(--ink);
            background: var(--green-bg);
            border: 2px solid var(--border);
            border-radius: 10px;
            padding: .65rem .9rem;
            margin-bottom: 1.25rem;
        }

        ul.ledger { list-style: none; margin: 0; padding: 0; display: flex; flex-direction: column; gap: .85rem; }

        .entry {
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            gap: 1rem;
            background: var(--white);
            border: 3px solid var(--border);
            border-radius: 14px;
            padding: 1rem 1.1rem;
            box-shadow: 4px 4px 0 var(--border);
            transition: transform .1s ease, box-shadow .1s ease;
        }

        .entry:hover {
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0 var(--border);
        }

        .entry.is-done { background: #fbfaff; }

        .check-form { margin: 0; }

        .check-btn {
            width: 1.6rem;
            height: 1.6rem;
            border-radius: 6px;
            border: 2.5px solid var(--border);
            background: var(--white);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            transition: background-color .1s ease, transform .1s ease;
        }

        .check-btn:hover { transform: scale(1.06); }

        .check-btn.done {
            background: var(--green);
            border-color: var(--border);
        }

        .check-btn svg { width: .95rem; height: .95rem; opacity: 0; color: var(--ink); }
        .check-btn.done svg { opacity: 1; }

        .task-main { min-width: 0; }

        .name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.05rem;
            font-weight: 600;
            color: var(--ink);
            line-height: 1.3;
        }

        .name.done {
            color: var(--ink-soft);
            text-decoration: line-through;
            text-decoration-thickness: 2px;
        }

        .desc {
            font-size: .82rem;
            color: var(--ink-soft);
            margin-top: .25rem;
            line-height: 1.45;
        }

        .task-foot {
            display: flex;
            align-items: center;
            gap: .55rem;
            margin-top: .55rem;
            flex-wrap: wrap;
        }

        .due {
            font-size: .76rem;
            font-weight: 600;
            color: var(--ink-soft);
        }

        .status-tag {
            font-family: 'Space Grotesk', sans-serif;
            font-size: .72rem;
            font-weight: 700;
            padding: .18rem .55rem;
            border-radius: 20px;
            border: 1.5px solid var(--border);
        }

        .status-tag.Pending { color: #8a2a1f; background: var(--coral-bg); }
        .status-tag.Completed { color: #0a6b4c; background: var(--green-bg); }

        .task-side {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: .6rem;
        }

        .row-actions { display: flex; gap: .7rem; }

        .row-actions form { margin: 0; }

        .row-actions a, .row-actions button {
            font: inherit;
            font-size: .76rem;
            font-weight: 600;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            color: var(--ink-soft);
            text-decoration: underline;
            text-decoration-color: transparent;
            transition: color .12s ease, text-decoration-color .12s ease;
        }

        .row-actions a:hover, .row-actions button:hover {
            color: var(--purple-dark);
            text-decoration-color: var(--purple-dark);
        }

        .row-actions .delete:hover { color: #d13a2e; text-decoration-color: #d13a2e; }

        .empty {
            text-align: center;
            padding: 3rem 1.5rem;
            color: var(--ink-soft);
            font-size: .9rem;
            background: var(--white);
            border: 3px dashed var(--border);
            border-radius: 14px;
        }

        /* ---------- Modal ---------- */

        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(23, 19, 31, .55);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1.25rem;
            z-index: 50;
        }

        .modal-overlay.open { display: flex; }

        .modal-box {
            width: 100%;
            max-width: 420px;
            background: var(--white);
            border: 3px solid var(--border);
            border-radius: 16px;
            box-shadow: 8px 8px 0 var(--border);
            padding: 2rem 1.9rem 1.7rem;
            animation: modal-in .14s ease;
        }

        @media (prefers-reduced-motion: reduce) {
            .modal-box { animation: none; }
        }

        @keyframes modal-in {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .modal-box h2 {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 1.35rem;
            margin: 0 0 1.3rem;
            color: var(--ink);
        }

        .field { margin-bottom: 1.15rem; }

        .field label {
            display: block;
            font-size: .8rem;
            font-weight: 600;
            color: var(--ink-soft);
            margin-bottom: .4rem;
        }

        .field input, .field textarea {
            width: 100%;
            padding: .6rem .75rem;
            border: 2px solid var(--border);
            border-radius: 8px;
            background: var(--bg);
            font: inherit;
            font-size: .9rem;
            color: var(--ink);
            transition: box-shadow .12s ease;
        }

        .field input::placeholder, .field textarea::placeholder { color: #9b93ad; }
        .field input:focus, .field textarea:focus,
        .check-btn:focus-visible, .btn:focus-visible, .add-link button:focus-visible,
        .row-actions a:focus-visible, .row-actions button:focus-visible,
        .modal-cancel:focus-visible {
            outline: 2px solid var(--purple);
            outline-offset: 2px;
        }
        .field input:focus, .field textarea:focus {
            outline: none;
            box-shadow: 3px 3px 0 var(--purple);
        }
        .field textarea { min-height: 80px; resize: vertical; }

        .invalid { border-color: var(--coral) !important; }
        .error-text { color: #c0392b; font-size: .78rem; margin-top: .35rem; font-weight: 500; }

        .modal-buttons { display: flex; gap: 1.3rem; align-items: center; margin-top: 1.6rem; }

        .btn {
            display: inline-block;
            padding: .6rem 1.3rem;
            border-radius: 9px;
            border: 2.5px solid var(--border);
            background: var(--purple);
            color: var(--white);
            font-family: 'Space Grotesk', sans-serif;
            font-size: .88rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 3px 3px 0 var(--border);
            transition: transform .08s ease, box-shadow .08s ease, background-color .12s ease;
        }

        .btn:hover {
            background: var(--purple-dark);
            transform: translate(-1px, -1px);
            box-shadow: 4px 4px 0 var(--border);
        }
        .btn:active {
            transform: translate(1px, 1px);
            box-shadow: 1px 1px 0 var(--border);
        }

        .modal-cancel {
            font-size: .85rem;
            font-weight: 600;
            color: var(--ink-soft);
            background: none;
            border: none;
            font-family: inherit;
            cursor: pointer;
            padding: 0;
        }

        .modal-cancel:hover { color: var(--ink); }

        @media (max-width: 560px) {
            .page { padding: 1.75rem 1rem 3rem; }
            h1 { font-size: 1.55rem; }
            .entry { grid-template-columns: auto 1fr; }
            .task-side { grid-column: 2; flex-direction: row; align-items: center; justify-content: space-between; margin-top: .5rem; }
        }
    </style>
</head>
<body>
<div class="page">

    <div class="hero">
        <div>
            <h1>Tasks</h1>
            <div class="dateline">{{ now()->format('l, F j') }}</div>
        </div>
        <div class="add-link">
            <button type="button" onclick="openAddModal()">+ New task</button>
        </div>
    </div>

    @if (session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    @if ($errors->any() && session('modal') === 'add')
        <script>window.addEventListener('DOMContentLoaded', () => openAddModal());</script>
    @endif

    <ul class="ledger">
        @forelse ($tasks as $task)
            <li class="entry {{ $task->status === 'Completed' ? 'is-done' : '' }}">
                <form method="POST" action="{{ route('tasks.status', $task) }}" class="check-form">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="check-btn {{ $task->status === 'Completed' ? 'done' : '' }}"
                            aria-label="{{ $task->status === 'Completed' ? 'Mark pending' : 'Mark done' }}">
                        <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 8.5L6.2 11.5L13 4.5" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>

                <div class="task-main">
                    <div class="name {{ $task->status === 'Completed' ? 'done' : '' }}">{{ $task->task_name }}</div>
                    @if ($task->description)
                        <div class="desc">{{ $task->description }}</div>
                    @endif
                    <div class="task-foot">
                        @if ($task->due_date)
                            <span class="due">{{ \Carbon\Carbon::parse($task->due_date)->format('M j') }}</span>
                        @endif
                        <span class="status-tag {{ $task->status }}">{{ $task->status }}</span>
                    </div>
                </div>

                <div class="task-side">
                    <div class="row-actions">
                        <button type="button"
                                onclick="openEditModal(
                                    '{{ route('tasks.update', $task) }}',
                                    {{ Illuminate\Support\Js::from($task->task_name) }},
                                    {{ Illuminate\Support\Js::from($task->description) }},
                                    {{ Illuminate\Support\Js::from($task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '') }}
                                )">Edit</button>
                        <form method="POST" action="{{ route('tasks.destroy', $task) }}"
                              onsubmit="return confirm('Delete this task?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
        @empty
            <li class="empty">Nothing on your list yet — add your first task.</li>
        @endforelse
    </ul>

</div>

<!-- Add Entry Modal -->
<div class="modal-overlay" id="add-modal-overlay">
    <div class="modal-box">
        <h2>New task</h2>
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <input type="hidden" name="modal_source" value="add">

            <div class="field">
                <label for="add_task_name">Task</label>
                <input type="text" id="add_task_name" name="task_name"
                       value="{{ session('modal') === 'add' ? old('task_name') : '' }}"
                       placeholder="What needs doing?"
                       class="@error('task_name') invalid @enderror">
                @error('task_name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="add_description">Notes (optional)</label>
                <textarea id="add_description" name="description" placeholder="Any details worth noting"
                          class="@error('description') invalid @enderror">{{ session('modal') === 'add' ? old('description') : '' }}</textarea>
                @error('description')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="add_due_date">Due (optional)</label>
                <input type="date" id="add_due_date" name="due_date"
                       value="{{ session('modal') === 'add' ? old('due_date') : '' }}"
                       class="@error('due_date') invalid @enderror">
                @error('due_date')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="modal-buttons">
                <button type="submit" class="btn">Save task</button>
                <button type="button" class="modal-cancel" onclick="closeModal('add-modal-overlay')">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Entry Modal (one shared form, filled in by JS) -->
<div class="modal-overlay" id="edit-modal-overlay">
    <div class="modal-box">
        <h2>Edit task</h2>
        <form method="POST" id="edit-form" action="">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="edit_task_name">Task</label>
                <input type="text" id="edit_task_name" name="task_name">
            </div>

            <div class="field">
                <label for="edit_description">Notes (optional)</label>
                <textarea id="edit_description" name="description"></textarea>
            </div>

            <div class="field">
                <label for="edit_due_date">Due (optional)</label>
                <input type="date" id="edit_due_date" name="due_date">
            </div>

            <div class="modal-buttons">
                <button type="submit" class="btn">Save changes</button>
                <button type="button" class="modal-cancel" onclick="closeModal('edit-modal-overlay')">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
        document.getElementById('add-modal-overlay').classList.add('open');
    }

    function openEditModal(action, name, description, dueDate) {
        const form = document.getElementById('edit-form');
        form.action = action;
        document.getElementById('edit_task_name').value = name || '';
        document.getElementById('edit_description').value = description || '';
        document.getElementById('edit_due_date').value = dueDate || '';
        document.getElementById('edit-modal-overlay').classList.add('open');
    }

    function closeModal(id) {
        document.getElementById(id).classList.remove('open');
    }

    // Close on backdrop click
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) overlay.classList.remove('open');
        });
    });

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.open').forEach(o => o.classList.remove('open'));
        }
    });
</script>
</body>
</html>