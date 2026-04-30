<script setup lang="ts">
import { Form, Head, Link } from '@inertiajs/vue3';
import { MessageSquareText, Send, Users } from 'lucide-vue-next';
import { chat, dashboard } from '@/routes';
import messages from '@/routes/messages';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Chat',
                href: chat(),
            },
        ],
    },
});
</script>

<template>
    <Head title="Chat" />

    <div class="flex h-full flex-1 flex-col gap-6 overflow-hidden p-4">
        <section
            class="grid gap-6 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)]"
        >
            <div
                class="relative overflow-hidden rounded-2xl border border-sidebar-border/70 bg-linear-to-br from-slate-950 via-slate-900 to-slate-800 p-6 text-white shadow-lg dark:border-sidebar-border"
            >
                <div
                    class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(59,130,246,0.22),transparent_36%),radial-gradient(circle_at_bottom_left,rgba(34,197,94,0.12),transparent_32%)]"
                />

                <div class="relative flex h-full flex-col gap-6">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p
                                class="text-xs font-medium uppercase tracking-[0.28em] text-sky-200/80"
                            >
                                Sala general
                            </p>
                            <h1 class="mt-2 text-3xl font-semibold">
                                Chat en vivo para todos los usuarios
                            </h1>
                            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-200/80">
                                Esta será la vista principal del chat público.
                                Más adelante conectaremos Reverb para que los
                                mensajes aparezcan en tiempo real.
                            </p>
                        </div>

                        <div
                            class="hidden rounded-full border border-white/10 bg-white/5 p-3 md:block"
                        >
                            <MessageSquareText class="size-6 text-sky-200" />
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-3">
                        <div
                            class="rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur"
                        >
                            <Users class="size-5 text-emerald-300" />
                            <p class="mt-3 text-2xl font-semibold">Todos</p>
                            <p class="mt-1 text-sm text-slate-300">
                                Un solo canal público.
                            </p>
                        </div>
                        <div
                            class="rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur"
                        >
                            <MessageSquareText class="size-5 text-sky-300" />
                            <p class="mt-3 text-2xl font-semibold">General</p>
                            <p class="mt-1 text-sm text-slate-300">
                                Sin salas privadas por ahora.
                            </p>
                        </div>
                        <div
                            class="rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur"
                        >
                            <Send class="size-5 text-amber-300" />
                            <p class="mt-3 text-2xl font-semibold">Próximo</p>
                            <p class="mt-1 text-sm text-slate-300">
                                Formulario de envío de mensajes.
                            </p>
                        </div>
                    </div>

                    <div class="mt-auto flex items-center justify-between gap-4">
                        <p class="text-sm text-slate-300">
                            Usuario autenticado, canal público `chat`.
                        </p>
                        <Link
                            :href="dashboard()"
                            class="inline-flex items-center rounded-full border border-white/10 bg-white/10 px-4 py-2 text-sm font-medium text-white transition hover:bg-white/15"
                        >
                            Volver al dashboard
                        </Link>
                    </div>
                </div>
            </div>

            <div class="grid min-h-128 gap-4">
                <div
                    class="flex flex-col overflow-hidden rounded-2xl border border-sidebar-border/70 bg-background shadow-sm dark:border-sidebar-border"
                >
                    <div
                        class="flex items-center justify-between border-b border-sidebar-border/70 px-4 py-3 dark:border-sidebar-border"
                    >
                        <div>
                            <p class="text-sm font-medium">Mensajes</p>
                            <p class="text-xs text-muted-foreground">
                                Vista preliminar del hilo compartido
                            </p>
                        </div>
                        <span
                            class="rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-medium text-emerald-600 dark:text-emerald-400"
                        >
                            En línea
                        </span>
                    </div>

                    <div class="flex flex-1 flex-col gap-3 p-4">
                        <div
                            class="max-w-[85%] rounded-2xl rounded-tl-sm bg-sidebar-accent p-3 text-sm text-sidebar-accent-foreground"
                        >
                            <p class="font-medium">Sistema</p>
                            <p class="mt-1">
                                Aquí mostraremos los mensajes que lleguen por
                                Reverb.
                            </p>
                        </div>
                        <div
                            class="ml-auto max-w-[85%] rounded-2xl rounded-tr-sm bg-primary p-3 text-sm text-primary-foreground"
                        >
                            <p class="font-medium">Tú</p>
                            <p class="mt-1">
                                Esta vista ya está lista para enchufar el chat.
                            </p>
                        </div>
                        <div
                            class="mt-auto rounded-xl border border-dashed border-sidebar-border/70 p-4 text-sm text-muted-foreground dark:border-sidebar-border"
                        >
                            <p class="font-medium text-foreground">
                                Área de composición
                            </p>
                            <p class="mt-1">
                                El formulario de abajo enviará mensajes al
                                backend y luego Reverb los difundirá al resto
                                de usuarios.
                            </p>
                        </div>
                    </div>

                    <Form
                        v-bind="messages.store.form()"
                        reset-on-success
                        class="border-t border-sidebar-border/70 p-4 dark:border-sidebar-border"
                        #default="{ errors, processing, submit }"
                    >
                        <label for="body" class="sr-only">Mensaje</label>
                        <textarea
                            id="body"
                            name="body"
                            rows="3"
                            maxlength="1000"
                            required
                            placeholder="Escribe un mensaje para toda la sala..."
                            @keydown.enter.exact.prevent="() => submit()"
                            class="min-h-28 w-full resize-none rounded-xl border border-sidebar-border/70 bg-background px-4 py-3 text-sm outline-none transition placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-sidebar-border"
                        ></textarea>

                        <p
                            v-if="errors.body"
                            class="mt-2 text-sm text-red-600 dark:text-red-400"
                        >
                            {{ errors.body }}
                        </p>

                        <div
                            class="mt-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between"
                        >
                            <p class="text-xs leading-5 text-muted-foreground">
                                Enter para enviar, Shift+Enter para saltar de
                                línea.
                            </p>

                            <button
                                type="submit"
                                :disabled="processing"
                                class="inline-flex items-center justify-center gap-2 rounded-full bg-primary px-5 py-2.5 text-sm font-medium text-primary-foreground transition hover:opacity-90 disabled:pointer-events-none disabled:opacity-60"
                            >
                                <Send class="size-4" />
                                <span>
                                    {{ processing ? 'Enviando...' : 'Enviar' }}
                                </span>
                            </button>
                        </div>
                    </Form>
                </div>
            </div>
        </section>
    </div>
</template>
